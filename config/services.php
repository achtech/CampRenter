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
    'facebook' => [
        'client_id' => '360178218666227',
        'client_secret' => 'a3fa2ae2888a513a5085055a6e544316',
        'redirect' => 'https://mycamper.ch/fr',
    ],
    'google' => [
        'client_id' => '620721606636-i3riupr3pq3jciso0sapna4lra9f6nnn.apps.googleusercontent.com',
        'client_secret' => 'eL-lGG0op9oTcKJeKvOeAI0Z',
        'redirect' => 'http://localhost:8000/callback',
    ],
];
