<?php

namespace SquegTech\Steam\Tests\Command\User;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\User\GetPlayerBans;

class GetPlayerBansTest extends TestCase
{
    /**
     * @var GetPlayerBans
     */
    private GetPlayerBans $instance;

    public function setUp(): void
    {
        $this->instance = new GetPlayerBans([123,456]);
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('ISteamUser', $this->instance->getInterface());
        $this->assertEquals('GetPlayerBans', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
    }

    public function testParamValues()
    {
        $this->assertEquals([
            'steamids' => '123,456',
        ], $this->instance->getParams());
    }
}
