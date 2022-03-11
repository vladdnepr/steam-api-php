<?php

namespace SquegTech\Steam\Tests\Command\EconItems;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\EconItems\GetPlayerItems;

class GetPlayerItemsTest extends TestCase
{
    /**
     * @var GetPlayerItems
     */
    private GetPlayerItems $instance;

    public function setUp(): void
    {
        $this->instance = new GetPlayerItems(123, 456);
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('IEconItems_123', $this->instance->getInterface());
        $this->assertEquals('GetPlayerItems', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals(['steamid' => 456], $this->instance->getParams());
    }
}
