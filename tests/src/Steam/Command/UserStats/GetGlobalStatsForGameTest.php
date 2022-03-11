<?php

namespace SquegTech\Steam\Tests\Command\UserStats;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\UserStats\GetGlobalStatsForGame;

class GetGlobalStatsForGameTest extends TestCase
{
    /**
     * @var GetGlobalStatsForGame
     */
    private GetGlobalStatsForGame $instance;

    public function setUp(): void
    {
        $this->instance = new GetGlobalStatsForGame(570, ['test']);
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('ISteamUserStats', $this->instance->getInterface());
        $this->assertEquals('GetGlobalStatsForGame', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
    }

    public function testParamValues()
    {
        $this->assertEquals([
            'appid' => 570,
            'count' => 1,
            'name' => ['test'],
        ], $this->instance->getParams());
    }

    public function testSettingStartAndEndData()
    {
        $date = new \DateTime();

        $this->instance->setStartDate($date);
        $this->instance->setEndDate($date);

        $this->assertEquals([
            'appid' => 570,
            'count' => 1,
            'name' => ['test'],
            'startdate' => $date->getTimestamp(),
            'enddate' => $date->getTimestamp(),
        ], $this->instance->getParams());
    }
}
