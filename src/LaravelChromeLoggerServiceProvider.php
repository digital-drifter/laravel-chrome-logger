<?php

namespace DigitalDrifter\LaravelChromeLogger;

use ChromePhp;
use Illuminate\Support\ServiceProvider;

class LaravelChromeLoggerServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ChromePhp::class, function () {
            return ChromePhp::getInstance();
        });

        $this->app->bind(LaravelChromeLogger::class, function () {
            return LaravelChromeLogger::getInstance();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {

        return [LaravelChromeLogger::class];
    }
}
