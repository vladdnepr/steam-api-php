<?php

namespace SquegTech\Steam\Tests\Command\TeamFortressItems;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\TeamFortressItems\GetGoldenWrenches;

class GetGoldenWrenchesTest extends TestCase
{
    /**
     * @var GetGoldenWrenches
     */
    private GetGoldenWrenches $instance;

    public function setUp(): void
    {
        $this->instance = new GetGoldenWrenches();
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('ITFItems_440', $this->instance->getInterface());
        $this->assertEquals('GetGoldenWrenches', $this->instance->getMethod());
        $this->assertEquals('v2', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([], $this->instance->getParams());
    }
}
