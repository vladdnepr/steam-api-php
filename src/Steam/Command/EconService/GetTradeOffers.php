<?php

namespace SquegTech\Steam\Command\EconService;

use DateTime;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\HasLanguage;

class GetTradeOffers implements CommandInterface
{
    use HasLanguage;

    /**
     * Request the list of sent offers.
     *
     * @var bool
     */
    private bool $getSentOffers = false;

    /**
     * Request the list of received offers.
     *
     * @var bool
     */
    private bool $getReceivedOffers = false;

    /**
     * If set, the item display data for the items included in the returned trade offers will also be returned.
     *
     * @var bool
     */
    private bool $getDescriptions = false;

    /**
     * Indicates we should only return offers which are still active.
     * Or offers that have changed in state since the time_historical_cutoff.
     *
     * @var bool
     */
    private bool $activeOnly = false;

    /**
     * Indicates we should only return offers which are not active.
     *
     * @var bool
     */
    private bool $historicalOnly = false;

    /**
     * When active_only is set, offers updated since this time will also be returned
     *
     * @var Datetime
     */
    private DateTime $timeHistoricalCutoff;

    /**
     * @param bool $getSentOffers
     * @return $this
     */
    public function setGetSentOffers(bool $getSentOffers): static
    {
        $this->getSentOffers = $getSentOffers;
        return $this;
    }

    /**
     * @param bool $getReceivedOffers
     * @return $this
     */
    public function setGetReceivedOffers(bool $getReceivedOffers): static
    {
        $this->getReceivedOffers = $getReceivedOffers;
        return $this;
    }

    /**
     * @param bool $getDescriptions
     * @return $this
     */
    public function setGetDescriptions(bool $getDescriptions): static
    {
        $this->getDescriptions = $getDescriptions;
        return $this;
    }

    /**
     * @param bool $activeOnly
     * @return $this
     */
    public function setActiveOnly(bool $activeOnly): static
    {
        $this->activeOnly = $activeOnly;
        return $this;
    }

    /**
     * @param bool $historicalOnly
     * @return $this
     */
    public function setHistoricalOnly(bool $historicalOnly): static
    {
        $this->historicalOnly = $historicalOnly;
        return $this;
    }

    /**
     * @param DateTime $timeHistoricalCutoff
     * @return $this
     */
    public function setTimeHistoricalCutoff(DateTime $timeHistoricalCutoff): static
    {
        $this->timeHistoricalCutoff = $timeHistoricalCutoff;
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
        return 'GetTradeOffers';
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
        $params = [
            'get_sent_offers' => $this->getSentOffers,
            'get_received_offers' => $this->getReceivedOffers,
            'get_descriptions' => $this->getDescriptions,
            'active_only' => $this->activeOnly,
            'historical_only' => $this->historicalOnly,
        ];

        empty($this->language) ?: $params['language'] = $this->language;
        empty($this->timeHistoricalCutoff) ?:
            $params['time_historical_cutoff'] = $this->timeHistoricalCutoff->getTimestamp();

        return $params;
    }
}
