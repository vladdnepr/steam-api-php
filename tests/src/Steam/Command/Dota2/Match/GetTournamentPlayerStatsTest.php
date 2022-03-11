<?php

namespace SquegTech\Steam\Tests\Command\Dota2\Match;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\Dota2\Match\GetTournamentPlayerStats;

class GetTournamentPlayerStatsTest extends TestCase
{
    /**
     * @var GetTournamentPlayerStats
     */
    private GetTournamentPlayerStats $instance;

    public function setUp(): void
    {
        $this->instance = new GetTournamentPlayerStats(123);
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('GetTournamentPlayerStats', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals(['account_id' => 123], $this->instance->getParams());
    }

    public function testInterfaceForDota2TestClient()
    {
        $this->instance->isForTestClient(true);
        $this->assertEquals('IDOTA2Match_205790', $this->instance->getInterface());
    }

    public function testInterfaceForDota2Client()
    {
        $this->instance->isForTestClient(false);
        $this->assertEquals('IDOTA2Match_570', $this->instance->getInterface());
    }

    public function testSettingLeague()
    {
        $this->instance->setLeagueId(123);

        $this->assertEquals(['account_id' => 123, 'league_id' => 123], $this->instance->getParams());
    }

    public function testSettingMatchId()
    {
        $this->instance->setMatchId(123);

        $this->assertEquals(['account_id' => 123, 'match_id' => 123], $this->instance->getParams());
    }

    public function testSettingHeroId()
    {
        $this->instance->setHeroId(123);

        $this->assertEquals(['account_id' => 123, 'hero_id' => 123], $this->instance->getParams());
    }

    public function testSettingDateMinAndMax()
    {
        $this->instance->setLeagueId(123);
        $this->instance->setHeroId(456);
        $this->instance->setMatchId(789);

        $this->assertEquals([
            'account_id' => 123,
            'league_id' => 123,
            'hero_id' => 456,
            'match_id' => 789,
        ], $this->instance->getParams());
    }
}
