<?php

namespace DigitalDrifter\LaravelChromeLogger\Facades;

use ChromePhp;
use DigitalDrifter\LaravelChromeLogger\LaravelChromeLogger as Logger;
use Illuminate\Support\Facades\Facade;

/**
 * Class LaravelChromeLogger
 *
 * @package DigitalDrifter\LaravelChromeLogger\Facades
 *
 * @method static ChromePhp getInstance()
 * @method static log(string $level = '', $parameters)
 * @method static warn(string $level = 'warn', $parameters)
 * @method static error(string $level = 'error', $parameters)
 * @method static info(string $level = 'info', $parameters)
 */
class LaravelChromeLogger extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Logger::class;
    }
}
