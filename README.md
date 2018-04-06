# Log PHP output to the Chrome console

Laravel bridge for [ChromePhp](https://craig.is/writing/chrome-logger). 

# Installation

This package requires the [Chrome Logger](https://chrome.google.com/webstore/detail/chrome-logger/noaneddfkdjfnfdakjjmocngnfkfehhd) extension.

Once you've installed the extension, add this package to your project via composer:

``` bash
$ composer require --dev digital-drifter/laravel-chrome-logger
```

Laravel 5.5 will automatically register the service provider through auto-discovery. 

Previous versions of the framework just add the service provider in `config/app.php` file:

```php
'providers' => [
    // ...
    DigitalDrifter\LaravelChromeLogger\LaravelChromeLoggerServiceProvider::class,
];
```

# Available Methods

All methods exposed on the `ChromePhp` class are available. The following comes directly from the class:

```php
/**
 * gets instance of this class
 *
 * @return ChromePhp
 */
public static function getInstance();

/**
 * logs a variable to the console
 *
 * @param mixed $data,... unlimited OPTIONAL number of additional logs [...]
 * @return void
 */
public static function log();

/**
 * logs a warning to the console
 *
 * @param mixed $data,... unlimited OPTIONAL number of additional logs [...]
 * @return void
 */
public static function warn();

/**
 * logs an error to the console
 *
 * @param mixed $data,... unlimited OPTIONAL number of additional logs [...]
 * @return void
 */
public static function error();

/**
 * sends a group log
 *
 * @param string value
 */
public static function group();

/**
 * sends an info log
 *
 * @param mixed $data,... unlimited OPTIONAL number of additional logs [...]
 * @return void
 */
public static function info();

/**
 * sends a collapsed group log
 *
 * @param string value
 */
public static function groupCollapsed();

/**
 * ends a group log
 *
 * @param string value
 */
public static function groupEnd();

/**
 * sends a table log
 *
 * @param string value
 */
public static function table();

/**
 * adds a setting
 *
 * @param string key
 * @param mixed value
 * @return void
 */
public function addSetting($key, $value);

/**
 * add ability to set multiple settings in one call
 *
 * @param array $settings
 * @return void
 */
public function addSettings(array $settings);

/**
 * gets a setting
 *
 * @param string key
 * @return mixed
 */
public function getSetting($key);
```

# Usage

### Dependency Injection

As with any other class registered in Laravel's service container, you may inject an instance into your code like:

```php
use DigitalDrifter\LaravelChromeLogger\LaravelChromeLogger;

...

/**
 * LaravelChromeLogger $logger
 */
protected $logger;

public function __construct(LaravelChromeLogger $logger)
{
	$this->logger = $logger;
}
``` 

### Facade

Using the provided facade:

```php
public function log(string $message)
{
	LaravelChromeLogger::log($message);
}
```

### Helper Method

The `console()` helper method is available.

```php
public function log(string $level = "log", string $message)
{
	console($level, $message);
}
```

# Credits

All credit to [Craig Cambell](https://github.com/ccampbell) for providing the basis to this package.
