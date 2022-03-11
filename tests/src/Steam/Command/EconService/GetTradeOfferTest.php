<?php

namespace SquegTech\Steam\Tests\Command\EconService;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\EconService\GetTradeOffer;

class GetTradeOfferTest extends TestCase
{
    /**
     * @var GetTradeOffer
     */
    private GetTradeOffer $instance;

    public function setUp(): void
    {
        $this->instance = new GetTradeOffer(123);
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('IEconService', $this->instance->getInterface());
        $this->assertEquals('GetTradeOffer', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([
            'tradeofferid' => 123,
        ], $this->instance->getParams());
    }

    public function testSettingLanguage()
    {
        $this->instance->setLanguage('en');
        $this->assertParams(['language' => 'en']);
    }

    public function assertParams($params)
    {
        $this->assertEquals(array_merge([
            'tradeofferid' => 123,
        ], $params), $this->instance->getParams());
    }
}
