<?php

namespace Bahadorbzd\TwilioNotificationChannel;

use Illuminate\Support\ServiceProvider;

class TwilioSmsChannelServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/twilio.php' => config_path('twilio.php'),
        ], 'twilio-config');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/twilio.php',
            'twilio',
        );
    }
}