<?php

use DigitalDrifter\LaravelChromeLogger\Facades\LaravelChromeLogger;

if (!function_exists('console')) {
    function console(string $level = 'log', array $parameters)
    {
        return LaravelChromeLogger::$level(...$parameters);
    }
}
