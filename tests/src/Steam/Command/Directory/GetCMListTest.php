<?php

namespace SquegTech\Steam\Tests\Command\Directory;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\Directory\GetCMList;

class GetCMListTest extends TestCase
{
    /**
     * @var GetCMList
     */
    private GetCMList $instance;

    public function setUp(): void
    {
        $this->instance = new GetCMList(123);
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('ISteamDirectory', $this->instance->getInterface());
        $this->assertEquals('GetCMList', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals(['cellid' => 123], $this->instance->getParams());
    }

    public function testSettingMaxCount()
    {
        $this->instance->setMaxCount(2);

        $this->assertEquals([
            'cellid' => 123,
            'maxcount' => 2
        ], $this->instance->getParams());
    }
}
