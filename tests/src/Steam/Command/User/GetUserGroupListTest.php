<?php

namespace SquegTech\Steam\Tests\Command\User;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\User\GetUserGroupList;

class GetUserGroupListTest extends TestCase
{
    /**
     * @var GetUserGroupList
     */
    private GetUserGroupList $instance;

    public function setUp(): void
    {
        $this->instance = new GetUserGroupList(123);
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('ISteamUser', $this->instance->getInterface());
        $this->assertEquals('GetUserGroupList', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
    }

    public function testParamValues()
    {
        $this->assertEquals([
            'steamid' => 123,
        ], $this->instance->getParams());
    }
}
