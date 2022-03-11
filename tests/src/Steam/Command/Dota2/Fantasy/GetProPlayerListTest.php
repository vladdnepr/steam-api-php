<?php

namespace SquegTech\Steam\Tests\Command\Dota2\Fantasy;


use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\Dota2\Fantasy\GetProPlayerList;

class GetProPlayerListTest extends TestCase
{
    /**
     * @var GetProPlayerList
     */
    private GetProPlayerList $instance;

    public function setUp(): void
    {
        $this->instance = new GetProPlayerList();
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('IDOTA2Fantasy_570', $this->instance->getInterface());
        $this->assertEquals('GetProPlayerList', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([], $this->instance->getParams());
    }
}
