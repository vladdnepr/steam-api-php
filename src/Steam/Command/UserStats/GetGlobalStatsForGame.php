<?php

namespace SquegTech\Steam\Command\UserStats;

use DateTime;
use SquegTech\Steam\Command\CommandInterface;

class GetGlobalStatsForGame implements CommandInterface
{
    /**
     * @var int
     */
    private int $count;

    /**
     * @var DateTime
     */
    private DateTime $startDate;

    /**
     * @var DateTime
     */
    private DateTime $endDate;

    /**
     * @param int $appId
     * @param array $statNames
     */
    public function __construct(
        private int $appId,
        private array $statNames
    ) {
        $this->count = count($statNames);
    }

    /**
     * @param DateTime $startDate
     * @return $this
     */
    public function setStartDate(DateTime $startDate): static
    {
        $this->startDate = $startDate;
        return $this;
    }

    /**
     * @param DateTime $endDate
     * @return $this
     */
    public function setEndDate(DateTime $endDate): static
    {
        $this->endDate = $endDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getInterface(): string
    {
        return 'ISteamUserStats';
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return 'GetGlobalStatsForGame';
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
            'appid' => $this->appId,
            'count' => $this->count,
            'name' => $this->statNames,
        ];

        if (isset($this->startDate)) {
            $params['startdate'] = $this->startDate->getTimestamp();
        }

        if (isset($this->endDate)) {
            $params['enddate'] = $this->endDate->getTimestamp();
        }

        return $params;
    }
}