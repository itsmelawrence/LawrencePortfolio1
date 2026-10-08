<?php

return [
    'enabled' => (bool) env('JARVIS_MONITORING_ENABLED', false),
    'base_url' => env('JARVIS_MONITORING_URL'),
    'token' => env('JARVIS_MONITORING_TOKEN'),
    'reporter_version' => '0.1.0',
    'application_version' => env('JARVIS_APPLICATION_VERSION'),
    'deployment_id' => env('JARVIS_DEPLOYMENT_ID'),
];
