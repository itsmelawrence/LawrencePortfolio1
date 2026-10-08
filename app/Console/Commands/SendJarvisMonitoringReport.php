<?php

namespace App\Console\Commands;

use App\Services\JarvisMonitoringReporter;
use Illuminate\Console\Command;
use Throwable;

class SendJarvisMonitoringReport extends Command
{
    protected $signature = 'jarvis:report {mode=heartbeat : heartbeat or snapshot}';

    protected $description = 'Send an outbound-only health report to the JARVIS monitoring API';

    public function handle(JarvisMonitoringReporter $reporter): int
    {
        $mode = (string) $this->argument('mode');
        if (! in_array($mode, ['heartbeat', 'snapshot'], true)) {
            $this->error('Mode must be heartbeat or snapshot.');

            return self::INVALID;
        }

        if (! $reporter->isConfigured()) {
            $this->error('JARVIS monitoring is disabled or missing its HTTPS URL or token.');

            return self::FAILURE;
        }

        try {
            if ($mode === 'snapshot') {
                $reporter->sendSnapshot();
                $this->info('JARVIS snapshot delivered.');

                return self::SUCCESS;
            }

            $snapshotRequested = $reporter->sendHeartbeat();
            $this->info('JARVIS heartbeat delivered.');

            if ($snapshotRequested) {
                $reporter->sendSnapshot();
                $this->info('JARVIS requested snapshot delivered.');
            }

            return self::SUCCESS;
        } catch (Throwable $exception) {
            $this->error('JARVIS report failed: '.$exception->getMessage());

            return self::FAILURE;
        }
    }
}
