<?php

namespace SquegTech\Steam\Tests\Command\GameServersService;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\GameServersService\GetServerIPsBySteamID;

class GetServerIPsBySteamIDTest extends TestCase
{
    /**
     * @var GetServerIPsBySteamID
     */
    private GetServerIPsBySteamID $instance;

    public function setUp(): void
    {
        $this->instance = new GetServerIPsBySteamID(123);
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('IGameServersService', $this->instance->getInterface());
        $this->assertEquals('GetServerIPsBySteamID', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals(['server_steamids' => 123], $this->instance->getParams());
    }
}
