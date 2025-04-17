<?php

return [
    'is_enabled' => env('TWILIO_IS_ENABLED', false),
    'sid'        => env('TWILIO_SID'),
    'token'      => env('TWILIO_AUTH_TOKEN'),
    'from'       => env('TWILIO_FROM'),
];