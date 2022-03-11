<?php

namespace SquegTech\Steam\Tests\Command\UserStats;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\UserStats\GetNumberOfCurrentPlayers;

class GetNumberOfCurrentPlayersTest extends TestCase
{
    /**
     * @var GetNumberOfCurrentPlayers
     */
    private GetNumberOfCurrentPlayers $instance;

    public function setUp(): void
    {
        $this->instance = new GetNumberOfCurrentPlayers(123);
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('ISteamUserStats', $this->instance->getInterface());
        $this->assertEquals('GetNumberOfCurrentPlayers', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
    }

    public function testParamValues()
    {
        $this->assertEquals([
            'appid' => 123,
        ], $this->instance->getParams());
    }
}
