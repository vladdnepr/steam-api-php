<?php

namespace SquegTech\Steam\Tests\Command\Dota2\Ticket;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\Dota2\Ticket\SteamAccountValidForEvent;

class SteamAccountValidForEventTest extends TestCase
{
    /**
     * @var SteamAccountValidForEvent
     */
    private SteamAccountValidForEvent $instance;

    public function setUp(): void
    {
        $this->instance = new SteamAccountValidForEvent(123, 456);
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('IDOTA2Ticket_570', $this->instance->getInterface());
        $this->assertEquals('SteamAccountValidForEvent', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([
            'eventid' => 123,
            'steamid' => 456,
        ], $this->instance->getParams());
    }
}
