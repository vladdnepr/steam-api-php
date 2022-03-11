<?php

namespace SquegTech\Steam\Tests\Command\Economy;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\Economy\GetAssetClassInfo;

class GetAssetClassInfoTest extends TestCase
{
    /**
     * @var GetAssetClassInfo
     */
    private GetAssetClassInfo $instance;

    public function setUp(): void
    {
        $this->instance = new GetAssetClassInfo(123, [1, 2, 3]);
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('ISteamEconomy', $this->instance->getInterface());
        $this->assertEquals('GetAssetClassInfo', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([
            'appid' => 123,
            'class_count' => 3,
            'classid0' => 1,
            'classid1' => 2,
            'classid2' => 3,
        ], $this->instance->getParams());
    }

    public function testSettingLanguageAppearsInParams()
    {
        $this->instance->setLanguage('en');

        $this->assertEquals([
            'appid' => 123,
            'language' => 'en',
            'class_count' => 3,
            'classid0' => 1,
            'classid1' => 2,
            'classid2' => 3,
        ], $this->instance->getParams());
    }

    public function testSettingInstancesIdsAppearsInParams()
    {
        $this->instance->setInstanceIds([4,5,6]);

        $this->assertEquals([
            'appid' => 123,
            'class_count' => 3,
            'classid0' => 1,
            'classid1' => 2,
            'classid2' => 3,
            'instanceid0' => 4,
            'instanceid1' => 5,
            'instanceid2' => 6,
        ], $this->instance->getParams());
    }
}
