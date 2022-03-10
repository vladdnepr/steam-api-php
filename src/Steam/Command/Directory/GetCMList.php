<?php

namespace SquegTech\Steam\Command\Directory;

use SquegTech\Steam\Command\CommandInterface;

class GetCMList implements CommandInterface
{
    /**
     * @var int
     */
    private int $maxCount;

    /**
     * @param int $appId
     */
    public function __construct(
        private int $appId
    ) {}

    /**
     * @param int $maxCount
     */
    public function setMaxCount(int $maxCount): void
    {
        $this->maxCount = $maxCount;
    }

    /**
     * @return string
     */
    public function getInterface(): string
    {
        return 'ISteamDirectory';
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return 'GetCMList';
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
     * @return int[]
     */
    public function getParams(): array
    {
        $params = [
            'cellid' => $this->appId,
        ];

        empty($this->maxCount) ?: $params['maxcount'] = $this->maxCount;

        return $params;
    }
}
