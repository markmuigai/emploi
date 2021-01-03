<?php

return [

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
        'client_id' => '336567974134803',
        'client_secret' => '7089eee51c02142c3fb68a099b75c473',
        'redirect' => '/auth-with/facebook/callback',
    ],
    'linkedin' => [
        'client_id' => '77klubztrgirb3',
        'client_secret' => 'DojN6sivbqqbxaAQ',
        'redirect' => '/auth-with/linkedin/callback',
    ],
    'google' => [
        'client_id' => '283801290702-7n9b866jvpr8395m0n5e3fgg4br72855.apps.googleusercontent.com',
        'client_secret' => 'la2NmgKQ-D1g046Hy0akXkmR',
        'redirect' => '/auth-with/google/callback',
    ],

];
