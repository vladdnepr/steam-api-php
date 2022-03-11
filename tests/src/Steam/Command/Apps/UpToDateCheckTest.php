<?php

namespace SquegTech\Steam\Tests\Command\Apps;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\Apps\UpToDateCheck;
use SquegTech\Steam\Command\CommandInterface;

class UpToDateCheckTest extends TestCase
{

    public function testImplementsInterface()
    {
        $appId = 570;
        $version = 123;
        $instance = new UpToDateCheck($appId, $version);

        $this->assertInstanceOf(CommandInterface::class, $instance);
    }

    public function testValues()
    {
        $appId = 570;
        $version = 123;
        $instance = new UpToDateCheck($appId, $version);

        $this->assertEquals('ISteamApps', $instance->getInterface());
        $this->assertEquals('UpToDateCheck', $instance->getMethod());
        $this->assertEquals('v1', $instance->getVersion());
        $this->assertEquals('GET', $instance->getRequestMethod());
        $this->assertEquals([
            'appId' => $appId,
            'version' => $version,
        ], $instance->getParams());
    }

    public function testParamsWithStringsPassedIn()
    {
        $appId = '570';
        $version = '123';
        $instance = new UpToDateCheck($appId, $version);

        $this->assertEquals([
            'appId' => 570,
            'version' => 123,
        ], $instance->getParams());
    }
}
