<?php

namespace SquegTech\Steam\Tests\Command\Dota2;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\Dota2\GetEmoticons;

class GetEmoticonsTest extends TestCase
{
    /**
     * @var GetEmoticons
     */
    private GetEmoticons $instance;

    public function setUp(): void
    {
        $this->instance = new GetEmoticons();
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('IEconDOTA2_570', $this->instance->getInterface());
        $this->assertEquals('GetEmoticons', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([], $this->instance->getParams());
    }
}
