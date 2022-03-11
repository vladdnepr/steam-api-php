<?php

namespace SquegTech\Steam\Tests\Command\UserStats;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\UserStats\GetPlayerAchievements;

class GetPlayerAchievementsTest extends TestCase
{
    /**
     * @var GetPlayerAchievements
     */
    private GetPlayerAchievements $instance;

    public function setUp(): void
    {
        $this->instance = new GetPlayerAchievements(123, 456);
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('ISteamUserStats', $this->instance->getInterface());
        $this->assertEquals('GetPlayerAchievements', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([
            'steamid' => 123,
            'appid' => 456,
        ], $this->instance->getParams());
    }

    public function testSettingLanguageAppearsInParams()
    {
        $this->instance->setLanguage('en');

        $this->assertEquals([
            'steamid' => 123,
            'appid' => 456,
            'l' => 'en'
        ], $this->instance->getParams());
    }
}
