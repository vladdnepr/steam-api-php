<?php

namespace SquegTech\Steam\Command\News;

use DateTime;
use SquegTech\Steam\Command\CommandInterface;

class GetNewsForApp implements CommandInterface
{
    /**
     * @var int
     */
    private int $maxLength;

    /**
     * @var DateTime
     */
    private DateTime $endDate;

    /**
     * @var int
     */
    private int $count = 20;

    /**
     * @var array
     */
    private array $feeds = [];

    /**
     * @param int $appId
     */
    public function __construct(
        private int $appId
    ) {}

    /**
     * @param int $count
     * @return $this
     */
    public function setCount(int $count): static
    {
        $this->count = $count;
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
     * @param array $feeds
     * @return $this
     */
    public function setFeeds(array $feeds): static
    {
        $this->feeds = $feeds;
        return $this;
    }

    /**
     * @param int $maxLength
     * @return $this
     */
    public function setMaxLength(int $maxLength): static
    {
        $this->maxLength = $maxLength;
        return $this;
    }

    /**
     * @return string
     */
    public function getInterface(): string
    {
        return 'ISteamNews';
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return 'GetNewsForApp';
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return 'v2';
    }

    /**
     * @return string
     */
    public function getRequestMethod(): string
    {
        return 'GET';
    }

    /**
     * @return int[]
     */
    public function getParams(): array
    {
        $params = [
            'appid' => $this->appId,
        ];

        empty($this->maxLength) ?: $params['maxlength'] = $this->maxLength;
        empty($this->endDate) ?: $params['enddate'] = $this->endDate->getTimestamp();
        empty($this->count) ?: $params['count'] = $this->count;
        empty($this->feeds) ?: $params['feeds'] = implode(',', $this->feeds);

        return $params;
    }
}