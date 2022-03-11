<?php

namespace SquegTech\Steam\Tests\Command\Portal2Leaderboards;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\Portal2Leaderboards\GetBucketizedData;

class GetBucketizedDataTest extends TestCase
{
    /**
     * @var GetBucketizedData
     */
    private GetBucketizedData $instance;

    public function setUp(): void
    {
        $this->instance = new GetBucketizedData('test');
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('GetBucketizedData', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals(['leaderboardName' => 'test'], $this->instance->getParams());
    }

    public function testInterfaceForDota2TestClient()
    {
        $this->instance->isForBeta(true);
        $this->assertEquals('IPortal2Leaderboards_841', $this->instance->getInterface());
    }

    public function testInterfaceForDota2Client()
    {
        $this->instance->isForBeta(false);
        $this->assertEquals('IPortal2Leaderboards_620', $this->instance->getInterface());
    }
}
