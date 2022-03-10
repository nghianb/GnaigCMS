<?php

return [
    'guards' => [
        'dashboard' => [
            'driver' => 'session',
            'provider' => 'dashboard',
        ],
    ],

    'providers' => [
        'dashboard' => [
            'driver' => 'eloquent',
            'model' => \Modules\User\Models\User::class,
        ],
    ]
];
