<?php

return [


    'B24_APPLICATION_SCOPE'  => explode(',', env('B24_APPLICATION_SCOPE')),
    'B24_APPLICATION_ID'     => env('B24_APPLICATION_ID'),
    'B24_APPLICATION_SECRET' => env('B24_APPLICATION_SECRET'),
    'DOMAIN'                 => env('B24_DOMAIN'),
    'REDIRECT_URI'           => env('B24_REDIRECT_URI', 'bitrix-redirect-uri'),
    'B24_INSTANCE'           => env('B24_INSTANCE', 'ru'),
    'ENCRYPTION_KEY'         => env('ENCRYPTION_KEY', 'bitrix-redirect-uri'),
    'ENCRYPTION_ALGO'        => env('ENCRYPTION_ALGO', 'ru'),
    'ACCOUNT_URL'            => env('ACCOUNT_URL', false),
    'MY_ACCOUNT_URL'         => env('MY_ACCOUNT_URL', false),
    'SP_APPARTMENTS_ID'      => env('SP_APPARTMENTS_ID', 156),
    'SP_UNITS_ID'            => env('SP_UNITS_ID', 171),
    'B24_CONNECTOR_ID'       => env('B24_CONNECTOR_ID'),
    'B24_CONNECTOR_NAME'     => env('B24_CONNECTOR_NAME'),
    'B24_CHAT_HANDLER'       => env('B24_CHAT_HANDLER'),
    'B24_CONNECTOR_COLOR'    => env('B24_CONNECTOR_COLOR'),
    'B24_LINE_APPEALS_ID'    => env('B24_LINE_APPEALS_ID'),
    'B24_WIDGET_NAME'        => env('B24_WIDGET_NAME'),
    'B24_NOTIFICATION'       => env('B24_NOTIFICATION'),
    'B24_DEAL_APPEALS_ID'    => env('B24_DEAL_APPEALS_ID'),
    'B24_DEAL_MY_APPEALS_ID'    => env('B24_DEAL_MY_APPEALS_ID'),

    'B24_RATE_MESSAGE'       => env('B24_RATE_MESSAGE'),

    #Групповые чаты
    'B24_DEAL_GROUP_CHAT_ID' => env('B24_DEAL_GROUP_CHAT_ID'),
    'B24_LINE_GROUP_CHAT_ID' => env('B24_LINE_GROUP_CHAT_ID'),

    #Личный чат
    'B24_DEAL_CHAT_ID'       => env('B24_DEAL_CHAT_ID'),
    'B24_LINE_CHAT_ID'       => env('B24_LINE_CHAT_ID'),
];
