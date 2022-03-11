<?php

namespace SquegTech\Steam\Tests\Command\WebApiUtil;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\WebApiUtil\GetSupportedApiList;

class GetSupportedApiListTest extends TestCase
{
    /**
     * @var GetSupportedAPIList
     */
    private GetSupportedApiList $instance;

    public function setUp(): void
    {
        $this->instance = new GetSupportedApiList();
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('ISteamWebAPIUtil', $this->instance->getInterface());
        $this->assertEquals('GetSupportedAPIList', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([], $this->instance->getParams());
    }
}
