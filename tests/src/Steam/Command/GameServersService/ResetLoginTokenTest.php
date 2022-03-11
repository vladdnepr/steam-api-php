<?php

namespace SquegTech\Steam\Tests\Command\GameServersService;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\GameServersService\ResetLoginToken;

class ResetLoginTokenTest extends TestCase
{
    /**
     * @var ResetLoginToken
     */
    private ResetLoginToken $instance;

    public function setUp(): void
    {
        $this->instance = new ResetLoginToken(123);
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('IGameServersService', $this->instance->getInterface());
        $this->assertEquals('ResetLoginToken', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('POST', $this->instance->getRequestMethod());
        $this->assertEquals([
            'steamid' => 123,
        ], $this->instance->getParams());
    }
}
