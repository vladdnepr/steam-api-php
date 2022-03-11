<?php

namespace SquegTech\Steam\Tests\Command\Dota2\Match;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\Dota2\Match\GetMatchHistory;
use SquegTech\Steam\Enums\Dota2GameMode;
use SquegTech\Steam\Enums\SkillLevel;

class GetMatchHistoryTest extends TestCase
{
    /**
     * @var GetMatchHistory
     */
    private GetMatchHistory $instance;

    public function setUp(): void
    {
        $this->instance = new GetMatchHistory();
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('GetMatchHistory', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([], $this->instance->getParams());
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

    public function testSettingAccountId()
    {
        $this->instance->setAccountId('123');
        $this->assertEquals(['account_id' => '123'], $this->instance->getParams());
    }

    public function testSettingMinPlayers()
    {
        $this->instance->setMinPlayers(5);
        $this->assertEquals(['min_players' => 5], $this->instance->getParams());
    }

    public function testSettingHeroId()
    {
        $this->instance->setHeroId(12);
        $this->assertEquals(['hero_id' => 12], $this->instance->getParams());
    }

    public function testSettingLeagueId()
    {
        $this->instance->setLeagueId(123);
        $this->assertEquals(['league_id' => 123], $this->instance->getParams());
    }

    public function testSettingStartAtMatchId()
    {
        $this->instance->setStartAtMatchId(123);
        $this->assertEquals(['start_at_match_id' => 123], $this->instance->getParams());
    }

    public function testSettingMatchesRequested()
    {
        $this->instance->setMatchesRequested(10);
        $this->assertEquals(['matches_requested' => 10], $this->instance->getParams());
    }

    public function testTournamentMatchesOnly()
    {
        $this->instance->setTournamentMatchesOnly(true);
        $this->assertEquals(['tournament_games_only' => true], $this->instance->getParams());
        $this->instance->setTournamentMatchesOnly(false);
        $this->assertEquals(['tournament_games_only' => false], $this->instance->getParams());
    }

    public function testSettingSkill()
    {
        $this->instance->setSkill(SkillLevel::TWO);
        $this->assertEquals(['skill' => 2], $this->instance->getParams());
    }

    public function testSettingGameMode()
    {
        $this->instance->setGameMode(Dota2GameMode::LEAST_PLAYED);
        $this->assertEquals(['game_mode' => 12], $this->instance->getParams());
    }
}
