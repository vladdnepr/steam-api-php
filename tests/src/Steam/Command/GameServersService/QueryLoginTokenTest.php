<?php

namespace SquegTech\Steam\Tests\Command\GameServersService;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\GameServersService\QueryLoginToken;

class QueryLoginTokenTest extends TestCase
{
    /**
     * @var QueryLoginToken
     */
    private QueryLoginToken $instance;

    public function setUp(): void
    {
        $this->instance = new QueryLoginToken('login_token_test');
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('IGameServersService', $this->instance->getInterface());
        $this->assertEquals('QueryLoginToken', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([
            'login_token' => 'login_token_test',
        ], $this->instance->getParams());
    }
}
