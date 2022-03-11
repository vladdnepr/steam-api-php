<?php

namespace SquegTech\Steam\Tests\Command\User;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\User\GetPlayerSummaries;

class GetPlayerSummariesTest extends TestCase
{
    /**
     * @var GetPlayerSummaries
     */
    private GetPlayerSummaries $instance;

    public function setUp(): void
    {
        $this->instance = new GetPlayerSummaries([123,456]);
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('ISteamUser', $this->instance->getInterface());
        $this->assertEquals('GetPlayerSummaries', $this->instance->getMethod());
        $this->assertEquals('v2', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
    }

    public function testParamValues()
    {
        $this->assertEquals([
            'steamids' => '123,456',
        ], $this->instance->getParams());
    }
}
