<?php

return [
    'name' => 'Zero waste project',
    'manifest' => [
        'name' => env('APP_NAME', 'My PWA App'),
        'short_name' => 'ZW project',
        'start_url' => '/',
        'background_color' => '#ffffff',
        'theme_color' => '#000000',
        'display' => 'standalone',
        'orientation'=> 'any',
        'status_bar'=> 'black',
        'icons' => [
            '72x72' => [
                'path' => '/assets/icons/icon-72x72.png',
                'purpose' => 'any'
            ],
            '96x96' => [
                'path' => '/assets/icons/icon-96x96.png',
                'purpose' => 'any'
            ],
            '128x128' => [
                'path' => '/assets/icons/icon-128x128.png',
                'purpose' => 'any'
            ],
            '144x144' => [
                'path' => '/assets/icons/icon-144x144.png',
                'purpose' => 'any'
            ],
            '152x152' => [
                'path' => '/assets/icons/icon-152x152.png',
                'purpose' => 'any'
            ],
            '192x192' => [
                'path' => '/assets/icons/icon-192x192.png',
                'purpose' => 'any'
            ],
            '384x384' => [
                'path' => '/assets/icons/icon-384x384.png',
                'purpose' => 'any'
            ],
            '512x512' => [
                'path' => '/assets/icons/icon-512x512.png',
                'purpose' => 'any'
            ],
        ],
        'shortcuts' => [
            [
                'name' => 'User Login',
                'description' => 'Here you can login',
                'url' => '/login',
                'icons' => [
                    "src" => "/assets/icons/icon-72x72.png",
                    "purpose" => "any"
                ]
            ],
            [
                'name' => 'Teacher Login',
                'description' => 'Here you can login',
                'url' => '/teacher/login',
            ],
            [
                'name' => 'Admin Login',
                'description' => 'Here you can login',
                'url' => '/admin/login',
            ]
        ],
        'custom' => []
    ]
];
