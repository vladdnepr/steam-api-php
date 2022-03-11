<?php

namespace SquegTech\Steam\Tests\Command\RemoteStorage;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\RemoteStorage\GetUGCFileDetails;

class GetUGCFileDetailsTest extends TestCase
{
    /**
     * @var GetUGCFileDetails
     */
    private GetUGCFileDetails $instance;

    public function setUp(): void
    {
        $this->instance = new GetUGCFileDetails(123, 456);
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('ISteamRemoteStorage', $this->instance->getInterface());
        $this->assertEquals('GetUGCFileDetails', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([
            'appid' => 123,
            'ugcid' => 456,
        ], $this->instance->getParams());
    }

    public function testSettingSteamId()
    {
        $this->instance->setSteamId(123);

        $this->assertEquals([
            'appid' => 123,
            'ugcid' => 456,
            'steamid' => 123,
        ], $this->instance->getParams());
    }
}
