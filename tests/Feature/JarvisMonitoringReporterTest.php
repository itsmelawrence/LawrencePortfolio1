<?php

namespace Tests\Feature;

use App\Services\JarvisMonitoringReporter;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class JarvisMonitoringReporterTest extends TestCase
{
    public function test_heartbeat_uses_the_site_token_without_putting_it_in_the_payload(): void
    {
        $this->configureReporter();
        Http::fake([
            'https://monitoring.example/api/v1/ingest/heartbeat' => Http::response([
                'data' => ['send_snapshot' => true],
            ]),
        ]);

        $snapshotRequested = app(JarvisMonitoringReporter::class)->sendHeartbeat();

        $this->assertTrue($snapshotRequested);
        Http::assertSent(function (Request $request): bool {
            return $request->url() === 'https://monitoring.example/api/v1/ingest/heartbeat'
                && $request->hasHeader('Authorization', 'Bearer site-secret')
                && $request['reporter']['type'] === 'jarvis-laravel'
                && ! array_key_exists('token', $request->data());
        });
    }

    public function test_snapshot_declares_capabilities_and_uncovered_checks(): void
    {
        $this->configureReporter();
        Http::fake([
            'https://monitoring.example/api/v1/ingest/snapshot' => Http::response([
                'data' => ['created' => true],
            ], 201),
        ]);

        app(JarvisMonitoringReporter::class)->sendSnapshot();

        Http::assertSent(function (Request $request): bool {
            $payload = $request->data();

            return $request->url() === 'https://monitoring.example/api/v1/ingest/snapshot'
                && $payload['platform']['name'] === 'laravel'
                && in_array('dependency_inventory', $payload['reporter']['capabilities'], true)
                && in_array('wordpress_components', $payload['not_covered'], true)
                && count($payload['dependencies']) > 0;
        });
    }

    public function test_reporter_rejects_non_https_configuration(): void
    {
        config([
            'monitoring.enabled' => true,
            'monitoring.base_url' => 'http://monitoring.example',
            'monitoring.token' => 'site-secret',
        ]);

        $this->assertFalse(app(JarvisMonitoringReporter::class)->isConfigured());
    }

    private function configureReporter(): void
    {
        config([
            'monitoring.enabled' => true,
            'monitoring.base_url' => 'https://monitoring.example',
            'monitoring.token' => 'site-secret',
        ]);
    }
}
