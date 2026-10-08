<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::command('jarvis:report heartbeat')
    ->everyFiveMinutes()
    ->withoutOverlapping(10)
    ->onOneServer()
    ->when(fn (): bool => (bool) config('monitoring.enabled'));

Schedule::command('jarvis:report snapshot')
    ->everySixHours()
    ->withoutOverlapping(30)
    ->onOneServer()
    ->when(fn (): bool => (bool) config('monitoring.enabled'));
