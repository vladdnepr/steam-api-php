<?php

namespace SquegTech\Steam\Tests\Command\Dota2\MatchStats;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\Dota2\MatchStats\GetRealtimeStats;

class GetRealtimeStatsTest extends TestCase
{
    /**
     * @var GetRealtimeStats
     */
    private GetRealtimeStats $instance;

    public function setUp(): void
    {
        $this->instance = new GetRealtimeStats(123);
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('IDOTA2MatchStats_570', $this->instance->getInterface());
        $this->assertEquals('GetRealtimeStats', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([
            'server_steam_id' =>  123,
        ], $this->instance->getParams());
    }
}
