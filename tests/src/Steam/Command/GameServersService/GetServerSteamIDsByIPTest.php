<?php

namespace SquegTech\Steam\Tests\Command\GameServersService;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\GameServersService\GetServerSteamIDsByIP;

class GetServerSteamIDsByIPTest extends TestCase
{
    /**
     * @var GetServerSteamIDsByIP
     */
    private GetServerSteamIDsByIP $instance;

    public function setUp(): void
    {
        $this->instance = new GetServerSteamIDsByIP('127.0.0.1');
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('IGameServersService', $this->instance->getInterface());
        $this->assertEquals('GetServerSteamIDsByIP', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals(['server_ips' => '127.0.0.1'], $this->instance->getParams());
    }
}
