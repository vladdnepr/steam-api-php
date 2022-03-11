<?php

namespace SquegTech\Steam\Tests\Command\PlayerService;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\PlayerService\GetSteamLevel;

class GetSteamLevelTest extends TestCase
{
    /**
     * @var GetSteamLevel
     */
    private GetSteamLevel $instance;

    public function setUp(): void
    {
        $this->instance = new GetSteamLevel(123);
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('IPlayerService', $this->instance->getInterface());
        $this->assertEquals('GetSteamLevel', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals(['steamid' => 123], $this->instance->getParams());
    }
}
