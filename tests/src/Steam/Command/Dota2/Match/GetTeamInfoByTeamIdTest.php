<?php

namespace SquegTech\Steam\Tests\Command\Dota2\Match;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\Dota2\Match\GetTeamInfoByTeamId;

class GetTeamInfoByTeamIdTest extends TestCase
{
    /**
     * @var GetTeamInfoByTeamId
     */
    private GetTeamInfoByTeamId $instance;

    public function setUp(): void
    {
        $this->instance = new GetTeamInfoByTeamId();
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('GetTeamInfoByTeamID', $this->instance->getMethod());
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

    public function testSettingDateMin()
    {
        $this->instance->setStartAtTeamId(123);

        $this->assertEquals(['start_at_team_id' => 123], $this->instance->getParams());
    }

    public function testSettingDateMax()
    {
        $this->instance->setTeamsRequested(123);

        $this->assertEquals(['teams_requested' => 123], $this->instance->getParams());
    }

    public function testSettingDateMinAndMax()
    {
        $this->instance->setStartAtTeamId(123);
        $this->instance->setTeamsRequested(123);

        $this->assertEquals([
            'start_at_team_id' => 123,
            'teams_requested' => 123,
        ], $this->instance->getParams());
    }
}
