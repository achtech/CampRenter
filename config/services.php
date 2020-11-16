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
        'client_id' => '414101039952819',
        'client_secret' => 'fb19d5febfcbb14b03aef44b9c1be0fa',
        'redirect' => 'http://localhost:8000/callback/facebook',
    ],
    'google' => [
        'client_id' => '366872804593-c4v1bv3ria1bie2lmci5u1m26ad3h3ql.apps.googleusercontent.com',
        'client_secret' => 'OHYChb26h03Hn-odQ-btKPzo',
        'redirect' => 'http://localhost:8000/callback/google',
    ],
];
