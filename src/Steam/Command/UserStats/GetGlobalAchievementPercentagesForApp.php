<?php

namespace SquegTech\Steam\Command\UserStats;

use SquegTech\Steam\Command\CommandInterface;

class GetGlobalAchievementPercentagesForApp implements CommandInterface
{
    /**
     * @param int $appId
     */
    public function __construct(
        private int $appId
    ) {}

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
        return 'GetGlobalAchievementPercentagesForApp';
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
        return [
            'gameid' => $this->appId,
        ];
    }
}