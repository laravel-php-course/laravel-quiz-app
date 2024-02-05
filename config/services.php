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

    'sms' => [
        'url' => env('SMS_SERVICE_URL', 'https://panel.asanak.com/webservice/v1rest/sendsms'),
        'username' => env('SMS_SERVICE_USERNAME', 'farzad1forouzanfar'),
        'password' => env('SMS_SERVICE_PASSWORD', 'F@rzad306762'),
        'source' => env('SMS_SERVICE_SOURCE_NUMBER', '98210000925306762') ,
        'template' => env('SMS_TEMPLATE', 'کاربر گرامی NAME عزیز با شماره موبایل MOBILE ورود شما را به سایت کویزر خوش آمد میگویم کد ورود شما به سایت : CODE است ') ,
        'teacherTemplate' => env('SMS_TEMPLATE_TEACHER' , 'استاد گرامی NAME گرامی با شماره موبایل MOBILE ورود شما به سایت کویزر را مفتخر هستیم کد ورود شما به سایت CODE است ')
    ] ,

    'throttle' => [
    'minute' => env('THROTTLE_MINUTE', 1),
    'time' => env('THROTTLE_TIME', 5)
     ],

    'paginate' => [
        'low' => env('LIMIT_PAGINATION_LOW', 3),
        'medium' => env('LIMIT_PAGINATION_MEDIUM', 5) ,
        'high' => env('LIMIT_PAGINATION_HIGH', 7)
    ],

    'telegram-bot-api' => [
        'token' => env('TELEGRAM_BOT_TOKEN', '6871340652:AAHJAU7-huPE6ATSeEh5S7dF9U0uRaecT0s')
    ],
];
