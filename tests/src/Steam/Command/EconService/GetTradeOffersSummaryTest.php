<?php

namespace SquegTech\Steam\Tests\Command\EconService;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\EconService\GetTradeOffersSummary;

class GetTradeOffersSummaryTest extends TestCase
{
    /**
     * @var GetTradeOffersSummary
     */
    private GetTradeOffersSummary $instance;

    public function setUp(): void
    {
        $this->instance = new GetTradeOffersSummary();
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('IEconService', $this->instance->getInterface());
        $this->assertEquals('GetTradeOffersSummary', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([], $this->instance->getParams());
    }

    public function testSettingTimeLastVisit()
    {
        $date = new \DateTime();
        $this->instance->setTimeLastVisit($date);
        $this->assertEquals([
            'time_last_visit' => $date->getTimestamp(),
        ], $this->instance->getParams());
    }
}
