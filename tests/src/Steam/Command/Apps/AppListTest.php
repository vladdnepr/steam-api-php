<?php

namespace SquegTech\Steam\Tests\Command\Apps;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\Apps\GetAppList;
use SquegTech\Steam\Command\CommandInterface;

class AppListTest extends TestCase
{
    /**
     * @var GetAppList
     */
    private GetAppList $instance;

    public function setUp(): void
    {
        $this->instance = new GetAppList();
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('ISteamApps', $this->instance->getInterface());
        $this->assertEquals('GetAppList', $this->instance->getMethod());
        $this->assertEquals('v2', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([], $this->instance->getParams());
    }
}
