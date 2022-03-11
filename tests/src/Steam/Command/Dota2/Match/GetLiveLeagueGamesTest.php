<?php

namespace SquegTech\Steam\Tests\Command\Dota2\Match;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\Dota2\Match\GetLiveLeagueGames;

class GetLiveLeagueGamesTest extends TestCase
{
    /**
     * @var GetLiveLeagueGames
     */
    private GetLiveLeagueGames $instance;

    public function setUp(): void
    {
        $this->instance = new GetLiveLeagueGames();
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('GetLiveLeagueGames', $this->instance->getMethod());
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

    public function testSettingLeagueId()
    {
        $this->instance->setLeagueId(123);

        $this->assertEquals(['league_id' => 123], $this->instance->getParams());
    }

    public function testSettingMatchId()
    {
        $this->instance->setMatchId(123);

        $this->assertEquals(['match_id' => 123], $this->instance->getParams());
    }

    public function testSettingLeagueAndMatchId()
    {
        $this->instance->setLeagueId(123);
        $this->instance->setMatchId(456);

        $this->assertEquals([
            'league_id' => 123,
            'match_id' => 456,
        ], $this->instance->getParams());
    }
}
