<?php

namespace SquegTech\Steam\Tests\Command\News;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\News\GetNewsForApp;

class GetNewsForAppTest extends TestCase
{
    /**
     * @var GetNewsForApp
     */
    private GetNewsForApp $instance;

    public function setUp(): void
    {
        $this->instance = new GetNewsForApp(570);
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('ISteamNews', $this->instance->getInterface());
        $this->assertEquals('GetNewsForApp', $this->instance->getMethod());
        $this->assertEquals('v2', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
    }

    public function testDefaultParamsValue()
    {
        $this->assertEquals([
            'appid' => 570,
            'count' => 20,
        ], $this->instance->getParams());
    }

    public function testSettingValuesAltersParams()
    {
        $date = new \DateTime();

        $this->instance->setMaxLength(200);
        $this->instance->setEndDate($date);
        $this->instance->setCount(10);
        $this->instance->setFeeds(['test', 'one']);

        $this->assertEquals([
            'appid' => 570,
            'maxlength' => 200,
            'enddate' => $date->getTimestamp(),
            'count' => 10,
            'feeds' => 'test,one',
        ], $this->instance->getParams());
    }
}
