<?php

namespace SquegTech\Steam\Tests\Command\EconService;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\EconService\DeclineTradeOffer;

class DeclineTradeOfferTest extends TestCase
{
    /**
     * @var DeclineTradeOffer
     */
    private DeclineTradeOffer $instance;

    public function setUp(): void
    {
        $this->instance = new DeclineTradeOffer(123);
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('IEconService', $this->instance->getInterface());
        $this->assertEquals('DeclineTradeOffer', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('POST', $this->instance->getRequestMethod());
        $this->assertEquals([
            'tradeofferid' => 123,
        ], $this->instance->getParams());
    }

    public function assertParams($params)
    {
        $this->assertEquals(array_merge([
            'tradeofferid' => 123,
        ], $params), $this->instance->getParams());
    }
}
