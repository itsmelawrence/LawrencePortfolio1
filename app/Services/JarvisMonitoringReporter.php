<?php

namespace App\Services;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use InvalidArgumentException;
use JsonException;
use Throwable;

final class JarvisMonitoringReporter
{
    /** @var list<string> */
    private const CAPABILITIES = [
        'heartbeat',
        'database_check',
        'scheduler_check',
        'dependency_inventory',
    ];

    public function isConfigured(): bool
    {
        $baseUrl = rtrim((string) config('monitoring.base_url'), '/');
        $token = trim((string) config('monitoring.token'));

        return (bool) config('monitoring.enabled')
            && $token !== ''
            && filter_var($baseUrl, FILTER_VALIDATE_URL) !== false
            && parse_url($baseUrl, PHP_URL_SCHEME) === 'https';
    }

    public function sendHeartbeat(): bool
    {
        $response = $this->request()->post('/api/v1/ingest/heartbeat', $this->heartbeatPayload());
        $response->throw();

        return (bool) $response->json('data.send_snapshot', false);
    }

    public function sendSnapshot(): void
    {
        $response = $this->request()->post('/api/v1/ingest/snapshot', $this->snapshotPayload());
        $response->throw();
    }

    /** @return array<string, mixed> */
    public function heartbeatPayload(): array
    {
        $databaseHealthy = $this->databaseHealthy();

        return [
            'schema_version' => 1,
            'reported_at' => now()->utc()->toIso8601String(),
            'reporter' => [
                'type' => 'jarvis-laravel',
                'version' => (string) config('monitoring.reporter_version', '0.1.0'),
                'capabilities' => self::CAPABILITIES,
            ],
            'runtime' => [
                'name' => 'php',
                'version' => PHP_VERSION,
            ],
            'checks' => [
                'application' => true,
                'database' => $databaseHealthy,
                'scheduler' => true,
            ],
            'deployment_id' => config('monitoring.deployment_id'),
        ];
    }

    /** @return array<string, mixed> */
    public function snapshotPayload(): array
    {
        $heartbeat = $this->heartbeatPayload();
        $databaseHealthy = (bool) $heartbeat['checks']['database'];

        return [
            ...$heartbeat,
            'platform' => [
                'name' => 'laravel',
                'version' => app()->version(),
            ],
            'application' => [
                'name' => (string) config('app.name'),
                'version' => config('monitoring.application_version'),
                'environment' => app()->environment(),
                'deployment_id' => config('monitoring.deployment_id'),
            ],
            'dependencies' => $this->composerDependencies(),
            'health_checks' => [
                [
                    'key' => 'application',
                    'label' => 'Application boot',
                    'status' => 'pass',
                    'message' => null,
                ],
                [
                    'key' => 'database',
                    'label' => 'Database connection',
                    'status' => $databaseHealthy ? 'pass' : 'fail',
                    'message' => $databaseHealthy ? null : 'The reporter could not query the database.',
                ],
                [
                    'key' => 'scheduler',
                    'label' => 'Scheduler execution',
                    'status' => 'pass',
                    'message' => null,
                ],
            ],
            'not_covered' => [
                'dependency_latest_versions',
                'wordpress_components',
                'wordpress_site_health',
            ],
        ];
    }

    private function request(): PendingRequest
    {
        if (! $this->isConfigured()) {
            throw new InvalidArgumentException('JARVIS monitoring is not configured with an HTTPS URL and token.');
        }

        return Http::baseUrl(rtrim((string) config('monitoring.base_url'), '/'))
            ->acceptJson()
            ->asJson()
            ->withToken(trim((string) config('monitoring.token')))
            ->timeout(5)
            ->retry([200, 1000]);
    }

    private function databaseHealthy(): bool
    {
        try {
            DB::select('select 1');

            return true;
        } catch (Throwable) {
            return false;
        }
    }

    /** @return list<array<string, bool|string|null>> */
    private function composerDependencies(): array
    {
        try {
            $manifest = $this->readJsonFile(base_path('composer.json'));
            $lock = $this->readJsonFile(base_path('composer.lock'));
        } catch (JsonException) {
            return [];
        }

        $productionRequirements = array_keys($manifest['require'] ?? []);
        $developmentRequirements = array_keys($manifest['require-dev'] ?? []);
        $dependencies = [];

        foreach ([
            [$lock['packages'] ?? [], false],
            [$lock['packages-dev'] ?? [], true],
        ] as [$packages, $development]) {
            foreach ($packages as $package) {
                if (! isset($package['name'], $package['version'])) {
                    continue;
                }

                $name = (string) $package['name'];
                $dependencies[] = [
                    'ecosystem' => 'composer',
                    'name' => $name,
                    'version' => (string) $package['version'],
                    'latest_version' => null,
                    'update_available' => null,
                    'direct' => in_array(
                        $name,
                        $development ? $developmentRequirements : $productionRequirements,
                        true,
                    ),
                    'development' => $development,
                ];
            }
        }

        usort($dependencies, fn (array $left, array $right): int => strcmp($left['name'], $right['name']));

        return $dependencies;
    }

    /** @return array<string, mixed> */
    private function readJsonFile(string $path): array
    {
        $contents = file_get_contents($path);
        if ($contents === false) {
            return [];
        }

        return json_decode($contents, true, flags: JSON_THROW_ON_ERROR);
    }
}
