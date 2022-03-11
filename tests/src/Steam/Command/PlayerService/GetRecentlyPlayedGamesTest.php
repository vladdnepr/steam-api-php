<?php

namespace SquegTech\Steam\Tests\Command\PlayerService;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\PlayerService\GetRecentlyPlayedGames;

class GetRecentlyPlayedGamesTest extends TestCase
{
    /**
     * @var GetRecentlyPlayedGames
     */
    private GetRecentlyPlayedGames $instance;

    public function setUp(): void
    {
        $this->instance = new GetRecentlyPlayedGames(123);
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('IPlayerService', $this->instance->getInterface());
        $this->assertEquals('GetRecentlyPlayedGames', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
    }

    public function testParamValues()
    {
        $this->assertEquals([
            'steamid' => 123,
            'count' => 0,
        ], $this->instance->getParams());
    }
}
