<?php

namespace SquegTech\Steam\Tests\Command\Economy;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\Economy\GetAssetPrices;

class GetAssetPricesTest extends TestCase
{
    /**
     * @var GetAssetPrices
     */
    private GetAssetPrices $instance;

    public function setUp(): void
    {
        $this->instance = new GetAssetPrices(123);
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('ISteamEconomy', $this->instance->getInterface());
        $this->assertEquals('GetAssetPrices', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([
            'appid' => 123,
        ], $this->instance->getParams());
    }

    public function testSettingLanguageAppearsInParams()
    {
        $this->instance->setLanguage('en');

        $this->assertEquals([
            'appid' => 123,
            'language' => 'en',
        ], $this->instance->getParams());
    }

    public function testSettingCurrencyAppearsInParams()
    {
        $this->instance->setCurrency('GBP');

        $this->assertEquals([
            'appid' => 123,
            'currency' => 'GBP',
        ], $this->instance->getParams());
    }
}
