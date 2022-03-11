<?php

namespace SquegTech\Steam\Tests\Command\CSGOServers;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\CSGOServers\GetGameServersStatus;

class GetGameServersStatusTest extends TestCase
{
    /**
     * @var GetGameServersStatus
     */
    private GetGameServersStatus $instance;

    public function setUp(): void
    {
        $this->instance = new GetGameServersStatus();
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('ICSGOServers_730', $this->instance->getInterface());
        $this->assertEquals('GetGameServersStatus', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([], $this->instance->getParams());
    }
}
