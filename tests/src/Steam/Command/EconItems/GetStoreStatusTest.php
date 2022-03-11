<?php

namespace SquegTech\Steam\Tests\Command\EconItems;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\EconItems\GetStoreStatus;

class GetStoreStatusTest extends TestCase
{
    /**
     * @var GetStoreStatus
     */
    private GetStoreStatus $instance;

    public function setUp(): void
    {
        $this->instance = new GetStoreStatus(123);
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('IEconItems_123', $this->instance->getInterface());
        $this->assertEquals('GetStoreStatus', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([], $this->instance->getParams());
    }
}
