<?php

namespace DigitalDrifter\LaravelChromeLogger\Traits;

use BadMethodCallException;
use ChromePhp;

/**
 * Trait LogsToChromeConsole
 *
 * @package DigitalDrifter\LaravelChromeLogger\Traits
 *
 * @see https://craig.is/writing/chrome-logger
 * @see https://chrome.google.com/webstore/detail/chrome-logger/noaneddfkdjfnfdakjjmocngnfkfehhd
 */
trait LogsToChromeConsole
{
    /**
     * @param string $method
     * @param array $parameters
     * @return mixed
     * @throws BadMethodCallException
     */
    public static function __callStatic(string $method, array $parameters)
    {
        if (static::canLog($method)) {
            return ChromePhp::$method(...$parameters);
        }

        static::badMethodCall($method);
    }

    /**
     * @param string $method
     * @param array $parameters
     * @return mixed
     * @throws BadMethodCallException
     */
    public function __call(string $method, array $parameters)
    {
        if (static::canLog($method)) {
            return with(resolve(ChromePhp::class), function (ChromePhp $chromePhp) use ($method, $parameters) {
                return call_user_func_array([$chromePhp, $method], ...$parameters);
            });
        }

        static::badMethodCall($method);
    }

    /**
     * @param string $method
     * @return bool
     */
    private static function canLog(string $method)
    {
        return config('app.debug') && in_array($method, get_class_methods(ChromePhp::class));
    }

    /**
     * @param string $method
     * @throws BadMethodCallException
     */
    private static function badMethodCall(string $method)
    {
        throw new BadMethodCallException(sprintf(
            'Method %s::%s does not exist.', ChromePhp::class, $method
        ));
    }
}
