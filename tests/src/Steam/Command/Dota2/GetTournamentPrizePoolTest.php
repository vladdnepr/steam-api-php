<?php

namespace SquegTech\Steam\Tests\Command\Dota2;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\Dota2\GetTournamentPrizePool;

class GetTournamentPrizePoolTest extends TestCase
{
    /**
     * @var GetTournamentPrizePool
     */
    private GetTournamentPrizePool $instance;

    public function setUp(): void
    {
        $this->instance = new GetTournamentPrizePool(123);
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('GetTournamentPrizePool', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals(['leagueid' => 123], $this->instance->getParams());
    }

    public function testInterfaceForDota2TestClient()
    {
        $this->instance->isForTestClient(true);
        $this->assertEquals('IEconDOTA2_205790', $this->instance->getInterface());
    }

    public function testInterfaceForDota2Client()
    {
        $this->instance->isForTestClient(false);
        $this->assertEquals('IEconDOTA2_570', $this->instance->getInterface());
    }
}
