<?php

return [
    'items' => [
        'catalog' => [
            'name' => 'Catalog',
            'children' => [
                'categories' => [
                    'name' => 'Categories',
                    'route' => 'categories.index'
                ]
            ],
            'order' => 0.4
        ]
    ]
];
