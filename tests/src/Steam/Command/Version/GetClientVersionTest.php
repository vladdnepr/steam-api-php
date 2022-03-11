<?php

namespace SquegTech\Steam\Tests\Command\Version;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\Version\GetClientVersion;

class GetClientVersionTest extends TestCase
{
    /**
     * @var GetClientVersion
     */
    private GetClientVersion $instance;

    public function setUp(): void
    {
        $this->instance = new GetClientVersion(123);
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('IGCVersion_123', $this->instance->getInterface());
        $this->assertEquals('GetClientVersion', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([], $this->instance->getParams());
    }
}
