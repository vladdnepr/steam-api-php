<?php

namespace SquegTech\Steam\Tests\Command\UserOAuth;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\UserOAuth\GetTokenDetails;

class GetTokenDetailsTest extends TestCase
{
    /**
     * @var GetTokenDetails
     */
    private GetTokenDetails $instance;

    public function setUp(): void
    {
        $this->instance = new GetTokenDetails('access_token_string');
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('ISteamUserOAuth', $this->instance->getInterface());
        $this->assertEquals('GetTokenDetails', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals(['access_token' => 'access_token_string'], $this->instance->getParams());
    }
}
