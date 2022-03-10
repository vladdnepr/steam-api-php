<?php

namespace SquegTech\Steam\Command\UserStats;

use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\HasLanguage;

class GetPlayerAchievements implements CommandInterface
{
    use HasLanguage;

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
        return 'GetPlayerAchievements';
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
            'steamid' => $this->steamId,
            'appid' => $this->appId,
        ];

        if (isset($this->language)) {
            $params['l'] = $this->language;
        }

        return $params;
    }
}