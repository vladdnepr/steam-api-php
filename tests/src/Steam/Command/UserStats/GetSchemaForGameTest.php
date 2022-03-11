<?php

namespace SquegTech\Steam\Tests\Command\UserStats;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\UserStats\GetSchemaForGame;

class GetSchemaForGameTest extends TestCase
{
    /**
     * @var GetSchemaForGame
     */
    private GetSchemaForGame $instance;

    public function setUp(): void
    {
        $this->instance = new GetSchemaForGame(123);
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('ISteamUserStats', $this->instance->getInterface());
        $this->assertEquals('GetSchemaForGame', $this->instance->getMethod());
        $this->assertEquals('v2', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([
            'appid' => 123,
        ], $this->instance->getParams());
    }

    public function testSettingLanguageAppearsInParams()
    {
        $this->instance->setLanguage('en');

        $this->assertEquals([
            'appid' => 123,
            'l' => 'en'
        ], $this->instance->getParams());
    }
}
