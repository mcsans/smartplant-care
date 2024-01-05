<?php

return [
    'paths' => [
        //  API
        [
            'path' => base_path('routes/api/master-data/routes.php'),
            'middleware' => 'api',
            'prefix' => 'api/master-data',
        ],

        [
            'path' => base_path('routes/api.php'),
            'middleware' => 'api',
            'prefix' => 'api',
        ],

        // WEB
        [
            'path' => base_path('routes/web.php'),
            'middleware' => 'web',
            'prefix' => null,
        ],
    ],
];
