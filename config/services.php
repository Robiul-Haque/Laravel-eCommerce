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
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'google' => [
        'client_id' => '860018243681-fdl1vj8n87qu6cs9kafbji8gm4mnh2ga.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'https://127.0.0.1:8000/callback'
    ],

    'facebook' => [
        'client_id' => '5656215387722429',
        'client_secret' => 'ea25b37f46527d2dfd417e0b76611d1e',
        'redirect' => 'https://localhost:8000/callback'
    ],

];
