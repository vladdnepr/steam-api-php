<?php

namespace SquegTech\Steam\Tests\Command\GameServersService;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\GameServersService\CreateAccount;

class CreateAccountTest extends TestCase
{
    /**
     * @var CreateAccount
     */
    private CreateAccount $instance;

    public function setUp(): void
    {
        $this->instance = new CreateAccount(123, 'memo');
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('IGameServersService', $this->instance->getInterface());
        $this->assertEquals('CreateAccount', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('POST', $this->instance->getRequestMethod());
        $this->assertEquals([
            'appid' => 123,
            'memo' => 'memo',
        ], $this->instance->getParams());
    }
}
