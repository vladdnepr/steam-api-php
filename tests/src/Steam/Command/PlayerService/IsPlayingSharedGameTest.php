<?php

namespace SquegTech\Steam\Tests\Command\PlayerService;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\PlayerService\IsPlayingSharedGame;

class IsPlayingSharedGameTest extends TestCase
{
    /**
     * @var IsPlayingSharedGame
     */
    private IsPlayingSharedGame $instance;

    public function setUp(): void
    {
        $this->instance = new IsPlayingSharedGame(123, 456);
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('IPlayerService', $this->instance->getInterface());
        $this->assertEquals('IsPlayingSharedGame', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([
            'steamid' => 123,
            'appid_playing' => 456,
        ], $this->instance->getParams());
    }
}
