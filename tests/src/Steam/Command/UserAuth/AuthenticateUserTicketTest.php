<?php

namespace SquegTech\Steam\Tests\Command\UserAuth;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\UserAuth\AuthenticateUserTicket;

class AuthenticateUserTicketTest extends TestCase
{
    /**
     * @var AuthenticateUserTicket
     */
    private AuthenticateUserTicket $instance;

    public function setUp(): void
    {
        $this->instance = new AuthenticateUserTicket(123, 'test');
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('ISteamUserAuth', $this->instance->getInterface());
        $this->assertEquals('AuthenticateUserTicket', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([
            'appid' => 123,
            'ticket' => 'test',
        ], $this->instance->getParams());
    }
}
