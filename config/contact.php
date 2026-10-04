<?php

return [
    'spam' => [
        'threshold' => (int) env('CONTACT_SPAM_THRESHOLD', 6),
        'autorespond' => (bool) env('CONTACT_SPAM_AUTORESPOND', true),
        'autorespond_threshold' => (int) env('CONTACT_SPAM_AUTORESPOND_THRESHOLD', 10),
    ],
];
