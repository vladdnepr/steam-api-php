<?php

namespace SquegTech\Steam\Tests\Command\Dota2\StreamSystem;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\Dota2\StreamSystem\GetBroadcasterInfo;

class GetBroadcasterInfoTest extends TestCase
{
    /**
     * @var GetBroadcasterInfo
     */
    private GetBroadcasterInfo $instance;

    public function setUp(): void
    {
        $this->instance = new GetBroadcasterInfo(123);
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('IDOTA2StreamSystem_570', $this->instance->getInterface());
        $this->assertEquals('GetBroadcasterInfo', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([
            'broadcaster_steam_id' => 123,
        ], $this->instance->getParams());
    }

    public function testSettingLeagueIdAppearsInParamsUsingSetter()
    {
        $this->instance->setLeagueId(456);

        $this->assertEquals([
            'broadcaster_steam_id' => 123,
            'league_id' => 456,
        ], $this->instance->getParams());
    }

    public function testSettingLanguageAppearsInParamsUsingConstrutor()
    {
        $instance = new GetBroadcasterInfo(123, 456);

        $this->assertEquals([
            'broadcaster_steam_id' => 123,
            'league_id' => 456,
        ], $instance->getParams());
    }
}
