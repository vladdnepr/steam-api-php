<?php
namespace SquegTech\Steam\Tests;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Configuration;
use SquegTech\Steam\Exception\InvalidConfigOptionException;
use SquegTech\Steam\Steam;

class ConfigurationTest extends TestCase
{
    /**
     * @var Configuration
     */
    private Configuration $configuration;

    public function setUp(): void
    {
        $this->configuration = new Configuration();
    }

    public function testSetSteamKey()
    {
        $steamKey = '123';

        $this->assertInstanceOf(Configuration::class, $this->configuration->setSteamKey($steamKey));
    }

    public function testGetSteamKey()
    {
        $steamKey = '123';

        $this->configuration->setSteamKey($steamKey);

        $this->assertEquals($steamKey, $this->configuration->getSteamKey());
    }

    public function testGetBaseSteamApiUrl()
    {
        $this->assertEquals(Steam::BASE_URL, $this->configuration->getBaseSteamApiUrl());
    }

    public function testSetOptionsExpectException()
    {
        $options = [
            'soft-kitty-warm-kitty-little-ball-of-fur' => true
        ];
        $this->configuration = new Configuration();

        $this->expectException(InvalidConfigOptionException::class);

        $this->configuration->setOptions($options);
    }

    public function testSetOptionsWithValidOptions()
    {
        $key = 'steam-api-key';
        $options = [
            Configuration::STEAM_KEY => $key
        ];

        $this->configuration->setOptions($options);

        $this->assertEquals($key, $this->configuration->getSteamKey());
    }
}