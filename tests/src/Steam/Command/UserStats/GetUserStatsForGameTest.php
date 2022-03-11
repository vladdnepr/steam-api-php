<?php

namespace SquegTech\Steam\Tests\Command\UserStats;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\UserStats\GetUserStatsForGame;

class GetUserStatsForGameTest extends TestCase
{
    /**
     * @var GetUserStatsForGame
     */
    private GetUserStatsForGame $instance;

    public function setUp(): void
    {
        $this->instance = new GetUserStatsForGame(123, 456);
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('ISteamUserStats', $this->instance->getInterface());
        $this->assertEquals('GetUserStatsForGame', $this->instance->getMethod());
        $this->assertEquals('v2', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([
            'steamid' => 123,
            'appid' => 456,
        ], $this->instance->getParams());
    }
}
