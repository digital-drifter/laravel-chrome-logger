<?php

use DigitalDrifter\LaravelChromeLogger\Facades\LaravelChromeLogger;

if (!function_exists('console')) {
    /**
     * @param string $level
     * @param array ...$parameters
     * @return mixed
     */
    function console()
    {
        $level      = 'log';
        $parameters = func_get_args();

        if (count($parameters) > 1) {
            $level      = $parameters[0];
            $parameters = array_slice($parameters, 1);
        }

        return LaravelChromeLogger::$level(...$parameters);
    }
}
