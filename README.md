# Steam API Wrapper

[![PHPUnit](https://github.com/SquegTech/steam-api-php/actions/workflows/phpunit.yml/badge.svg)](https://github.com/SquegTech/steam-api-php/actions/workflows/phpunit.yml)

A PHP wrapper for the Steam API. Updated and maintained for the latest versions of PHP and Guzzle.

This package replaces https://github.com/DaMitchell/steam-api-php which has been abandoned.

All existing commands are based on this documentation: [https://steamapi.xpaw.me/](https://steamapi.xpaw.me/).

Installation
------------
Install the latest version using [Composer](http://getcomposer.org) by running `composer require squegtech/steam-api`

Usage
-----
```php
<?php

include_once __DIR__ . '/../vendor/autoload.php';

use GuzzleHttp\Client;
use SquegTech\Steam\Command\Apps\GetAppList;
use SquegTech\Steam\Configuration;
use SquegTech\Steam\Runner\GuzzleRunner;
use SquegTech\Steam\Runner\DecodeJsonStringRunner;
use SquegTech\Steam\Steam;
use SquegTech\Steam\Utility\GuzzleUrlBuilder;

$steam = new Steam(new Configuration([
    Configuration::STEAM_KEY => '<insert steam key here>'
]));
$steam->addRunner(new GuzzleRunner(new Client(), new GuzzleUrlBuilder()));
$steam->addRunner(new DecodeJsonStringRunner());

/** @var array $result */
$result = $steam->run(new GetAppList());

var_dump($result);
```

Configuration
-------------
Two parameters can be passed to the `Configuration` object:
- **steam_key**, the API key you can get from [https://steamcommunity.com/dev/apikey](http://steamcommunity.com/dev/apikey).
- **base_steam_api_url**, an optional parameter to override `https://api.steampowered.com` as the base API URL. 

As shown above you can set the Steam API key by passing it into the 
`Configuration` constructor:

```php
$steam = new Steam(new Configuration([
    Configuration::STEAM_KEY => '<insert steam key here>'
]));
```

Command
-------
Commands are the classes that describe each endpoint. Each command implements `SquegTech\Steam\Command\CommandInterface` and has methods that will give the runners its interface, method, version, HTTP method and any parameterqqqqqs the endpoint requires.

The majority of commands are for GET endpoints. The POST endpoints are not fully implemented so please submit PRs for those you'd like to add.

Runners
-------
Runners are simple objects that implement `SquegTech\Steam\Runner\RunnerInterface`. This interface has 3 methods with the most important being `run`. The other 2 are for setting the config object.

The run method has 2 arguments, `$command` and `$result`. `$command` is the endpoint you request on and `$result` is the result of the previous runner. This means that the `$result` of the first runner attached will be null.

Docker
-----
This project comes with a Docker image and Docker Compose environment ready to run. Make sure to have both installed and start it with `docker-compose up -d`.

Once the Docker environment has started its command line can be accessed with `docker-compose exec squegtech-steam-api bash`. 

Tests
-----
Run the tests from the project root with `docker-compose exec squegtech-steam-api vendor/phpunit/phpunit/phpunit` outside of the Docker environment or `vendor/phpunit/phpunit/phpunit` inside of its bash shell.
