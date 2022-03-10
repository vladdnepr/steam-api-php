<?php

namespace SquegTech\Steam\Command\EconService;

use DateTime;
use SquegTech\Steam\Command\CommandInterface;

class GetTradeOffersSummary implements CommandInterface
{
    /**
     * @var DateTime
     */
    private DateTime $timeLastVisit;

    /**
     * @param DateTime $timeLastVisit
     * @return $this
     */
    public function setTimeLastVisit(DateTime $timeLastVisit): static
    {
        $this->timeLastVisit = $timeLastVisit;
        return $this;
    }

    /**
     * @return string
     */
    public function getInterface(): string
    {
        return 'IEconService';
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return 'GetTradeOffersSummary';
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return 'v1';
    }

    /**
     * @return string
     */
    public function getRequestMethod(): string
    {
        return 'GET';
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        $params = [];

        empty($this->timeLastVisit) ?: $params['time_last_visit'] = $this->timeLastVisit->getTimestamp();

        return $params;
    }
}
