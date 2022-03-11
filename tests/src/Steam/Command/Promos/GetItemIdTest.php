<?php

namespace SquegTech\Steam\Tests\Command\Promos;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\Promos\GetItemId;

class GetItemIdTest extends TestCase
{
    /**
     * @var GetItemId
     */
    private GetItemId $instance;

    public function setUp(): void
    {
        $this->instance = new GetItemId(123, 456, 789);
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('ITFPromos_123', $this->instance->getInterface());
        $this->assertEquals('GetItemID', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([
            'steamid' => 456,
            'promoid' => 789,
        ], $this->instance->getParams());
    }
}