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