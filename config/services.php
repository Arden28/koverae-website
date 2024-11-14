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

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    // PAYMENTS
    'stripe' => [
        'model'  => App\Models\User::class,
        'key'    => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    // Vonage
	'vonage' => [
    	'whatsapp' => [
        	'from_phone_number' => env('WHATSAPP_PHONE_NUMBER'),
    	],
	],
    // Koverae
    'koverae' => [
        'client_id' => env('KOVERAE_CLIENT_ID'),
        'client_secret' => env('KOVERAE_CLIENT_SECRET'),
        'redirect_uri' => env('KOVERAE_REDIRECT_URI'),  // URL to Client App's callback route
        'authorize_url' => env('KOVERAE_AUTHORIZE_URL'), // Provider's /oauth/authorize URL
        'token_url' => env('KOVERAE_TOKEN_URL'),         // Provider's /oauth/token URL
        'user_url' => env('KOVERAE_USER_URL'),           // Provider's /api/user URL
    ],

];
