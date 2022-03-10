<?php

namespace SquegTech\Steam\Command\UserStats;

use SquegTech\Steam\Command\CommandInterface;

class GetUserStatsForGame implements CommandInterface
{
    /**
     * @param int $steamId
     * @param int $appId
     */
    public function __construct(
        private int $steamId,
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
        return 'GetUserStatsForGame';
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
     * @return array
     */
    public function getParams(): array
    {
        return [
            'steamid' => $this->steamId,
            'appid' => $this->appId,
        ];
    }
}