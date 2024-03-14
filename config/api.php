<?php

return [

    'tilda' => [
        'url'     => env('API_TILDA_URL', 'https://api.tildacdn.info/v1/'),
        'id'      => env('API_TILDA_ID', false),
        'public'  => env('API_TILDA_PUBLIC', false),
        'secret'  => env('API_TILDA_SECRET', false),
        'timeout' => env('API_TILDA_TIMEOUT', 20),
    ],

    'bridge' => [
        'url'       => env('API_BRIDGE_URL'),
        'login'     => env('API_BRIDGE_SERVICE', "tenant"),
        'api_token' => env('API_BRIDGE_SECRET', "MARKE9cHtra4FrnVqMdE0FVwvEmBf1g8FKq3VhmgyduAUBPJNxTDwToRH3bw"),
        'timeout'   => env('API_TILDA_TIMEOUT', 20),
    ],

];
