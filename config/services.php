<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'facebook' => [
        'client_id'     => '366381817215315',
        'client_secret' => '9fdeb44a7a605a910f814e2961b5d0bd',
        'redirect'      => 'http://fd.shopping.vn/facebook/callback',
    ],
    'google' => [
        'client_id'     => '394908973504-2ah88t4bgqshpa84mgmsds4cb5doirin.apps.googleusercontent.com',
        'client_secret' => 'VoRMp9Xbv9jZEFHMVNOokraR',
        'redirect'      => 'http://fd.shopping.vn/google/callback',
    ],

];
