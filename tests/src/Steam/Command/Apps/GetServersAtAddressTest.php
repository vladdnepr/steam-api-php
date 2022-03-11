<?php

namespace SquegTech\Steam\Tests\Command\Apps;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\Apps\GetServersAtAddress;
use SquegTech\Steam\Command\CommandInterface;

class GetServersAtAddressTest extends TestCase
{
    /**
     * @var GetServersAtAddress
     */
    private GetServersAtAddress $instance;

    public function setUp(): void
    {
        $this->instance = new GetServersAtAddress('127.0.0.1');
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('ISteamApps', $this->instance->getInterface());
        $this->assertEquals('GetServersAtAddress', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals(['addr' => '127.0.0.1'], $this->instance->getParams());
    }
}
