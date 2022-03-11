<?php

namespace SquegTech\Steam\Tests\Command\Dota2\Fantasy;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\Dota2\Fantasy\GetPlayerOfficialInfo;

class GetPlayerOfficialInfoTest extends TestCase
{
    /**
     * @var GetPlayerOfficialInfo
     */
    private GetPlayerOfficialInfo $instance;

    public function setUp(): void
    {
        $this->instance = new GetPlayerOfficialInfo(123);
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('GetPlayerOfficialInfo', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals(['accountid' => 123], $this->instance->getParams());
    }

    public function testInterfaceForDota2TestClient()
    {
        $this->instance->isForTestClient(true);
        $this->assertEquals('IDOTA2Fantasy_205790', $this->instance->getInterface());
    }

    public function testInterfaceForDota2Client()
    {
        $this->instance->isForTestClient(false);
        $this->assertEquals('IDOTA2Fantasy_570', $this->instance->getInterface());
    }
}
