<?php

return [


//   'default' => env('BROADCAST_DRIVER', 'log'),
  'default' => env('BROADCAST_DRIVER', 'pusher'),



'connections' => [
    'pusher' => [
        'driver' => 'pusher',
        'key' => env('PUSHER_APP_KEY'),
        'secret' => env('PUSHER_APP_SECRET'),
        'app_id' => env('PUSHER_APP_ID'),
        'options' => [
            'cluster' => env('PUSHER_APP_CLUSTER'),
            'useTLS' => true,
            'host' => 'api-' . env('PUSHER_APP_CLUSTER') . '.pusher.com',
            'port' => 443,
            'scheme' => 'https',
            'encrypted' => true,
        ],
    ],
        'ably' => [
            'driver' => 'ably',
            'key' => env('ABLY_KEY'),
        ],

        'redis' => [
            'driver' => 'redis',
            'connection' => 'default',
        ],

        'log' => [
            'driver' => 'log',
        ],

        'null' => [
            'driver' => 'null',
        ],

    ],

];
