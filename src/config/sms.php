<?php

return [
    'api_key'   => env('SMS_API_KEY'),
    'api_token' => env('SMS_API_TOKEN'),
    'sender_id' => env('SMS_SENDER_ID'),
    'type'      => env('SMS_TYPE', "sms"),
    'route'     => env('SMS_ROUTE', 0)
];