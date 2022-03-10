<?php

return [
    'items' => [
        'system' => [
            'name' => 'System',
            'children' => [
                'users' => [
                    'name' => 'Users',
                    'route' => 'users.index'
                ]
            ],
            'order' => 1
        ]
    ]
];
