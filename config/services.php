<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'key' => env('POSTMARK_API_KEY'),
    ],

    'resend' => [
        'key' => env('RESEND_API_KEY'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'nzpost' => [
        'client_id'     => env('NZPOST_CLIENT_ID'),
        'client_secret' => env('NZPOST_CLIENT_SECRET'),
        'env'           => env('NZPOST_ENV', 'uat'),
        'sender_details' => [
            'name'     => env('NZPOST_SENDER_NAME'),
            'phone'    => env('NZPOST_SENDER_PHONE'),
            'email'    => env('NZPOST_SENDER_EMAIL'),
            'company'  => env('NZPOST_SENDER_COMPANY'),
            'street'   => env('NZPOST_SENDER_STREET'),
            'city'     => env('NZPOST_SENDER_CITY'),
            'postcode' => env('NZPOST_SENDER_POSTCODE'),
        ],
        'pickup_address' => [
            'street_number' => env('NZPOST_PICKUP_STREET_NUMBER'),
            'street'        => env('NZPOST_PICKUP_STREET'),
            'suburb'        => env('NZPOST_PICKUP_SUBURB'),
            'city'          => env('NZPOST_PICKUP_CITY'),
            'postcode'      => env('NZPOST_PICKUP_POSTCODE'),
            'country_code'  => 'NZ',
        ],
        'auth_url' => env('NZPOST_AUTH_URL'),
    ],


    'stripe' => [
        'key'                    => env('STRIPE_KEY'),
        'secret'                 => env('STRIPE_SECRET'),
        'webhook_secret'         => env('STRIPE_WEBHOOK_SECRET'),
        'connect_webhook_secret' => env('STRIPE_CONNECT_WEBHOOK_SECRET'),
        'client_account_id'      => env('CLIENT_STRIPE_ACCOUNT_ID'),
    ],

    'google' => [
        'places_api_key' => env('GOOGLE_PLACES_API_KEY'),
    ],

    'admin' => [
        'email' => env('ADMIN_EMAIL', 'admin@forestfairyhoney.co.nz'),
        'password' => env('ADMIN_PASSWORD', 'password'),
    ],

];

