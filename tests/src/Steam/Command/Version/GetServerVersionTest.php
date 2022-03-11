<?php

namespace SquegTech\Steam\Tests\Command\Version;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\Version\GetServerVersion;

class GetServerVersionTest extends TestCase
{
    /**
     * @var GetServerVersion
     */
    private GetServerVersion $instance;

    public function setUp(): void
    {
        $this->instance = new GetServerVersion(123);
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('IGCVersion_123', $this->instance->getInterface());
        $this->assertEquals('GetServerVersion', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([], $this->instance->getParams());
    }
}
