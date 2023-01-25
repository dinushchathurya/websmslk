<?php

namespace Dinushchathurya\Websms;

use Illuminate\Support\ServiceProvider;

class SmsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/sms.php' => config_path('sms.php'),
        ]);
    }

    public function register()
    {
        $this->app->bind('sms', function () {
            return new Sms();
        });
    }
}