<?php

namespace SquegTech\Steam\Tests\Command\GameServersService;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\GameServersService\SetMemo;

class SetMemoTest extends TestCase
{
    /**
     * @var SetMemo
     */
    private SetMemo $instance;

    public function setUp(): void
    {
        $this->instance = new SetMemo(123, 'memo');
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('IGameServersService', $this->instance->getInterface());
        $this->assertEquals('SetMemo', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('POST', $this->instance->getRequestMethod());
        $this->assertEquals([
            'steamid' => 123,
            'memo' => 'memo',
        ], $this->instance->getParams());
    }
}
