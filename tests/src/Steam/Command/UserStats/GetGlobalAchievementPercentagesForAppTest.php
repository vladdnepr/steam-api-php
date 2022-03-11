<?php

namespace SquegTech\Steam\Tests\Command\UserStats;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\UserStats\GetGlobalAchievementPercentagesForApp;

class GetGlobalAchievementPercentagesForAppTest extends TestCase
{
    /**
     * @var GetGlobalAchievementPercentagesForApp
     */
    private GetGlobalAchievementPercentagesForApp $instance;

    public function setUp(): void
    {
        $this->instance = new GetGlobalAchievementPercentagesForApp(123);
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('ISteamUserStats', $this->instance->getInterface());
        $this->assertEquals('GetGlobalAchievementPercentagesForApp', $this->instance->getMethod());
        $this->assertEquals('v2', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
    }

    public function testParamValues()
    {
        $this->assertEquals([
            'gameid' => 123,
        ], $this->instance->getParams());
    }
}
