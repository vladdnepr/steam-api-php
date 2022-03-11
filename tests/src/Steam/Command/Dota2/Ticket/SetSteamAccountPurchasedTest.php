<?php

namespace SquegTech\Steam\Tests\Command\Dota2\Ticket;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\Dota2\Ticket\SetSteamAccountPurchased;

class SetSteamAccountPurchasedTest extends TestCase
{
    /**
     * @var SetSteamAccountPurchased
     */
    private SetSteamAccountPurchased $instance;

    public function setUp(): void
    {
        $this->instance = new SetSteamAccountPurchased(123, 456);
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('IDOTA2Ticket_570', $this->instance->getInterface());
        $this->assertEquals('SetSteamAccountPurchased', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('POST', $this->instance->getRequestMethod());
        $this->assertEquals([
            'eventid' => 123,
            'steamid' => 456,
        ], $this->instance->getParams());
    }
}
