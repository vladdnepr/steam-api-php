<?php

namespace SquegTech\Steam\Tests\Command\PlayerService;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\PlayerService\GetCommunityBadgeProgress;

class GetCommunityBadgeProgressTest extends TestCase
{
    /**
     * @var GetCommunityBadgeProgress
     */
    private GetCommunityBadgeProgress $instance;

    public function setUp(): void
    {
        $this->instance = new GetCommunityBadgeProgress(123, 456);
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('IPlayerService', $this->instance->getInterface());
        $this->assertEquals('GetCommunityBadgeProgress', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([
            'steamid' => 123,
            'badgeid' => 456,
        ], $this->instance->getParams());
    }
}
