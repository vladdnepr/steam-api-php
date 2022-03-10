<?php

namespace SquegTech\Steam\Command\Dota2\MatchStats;

use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Traits\Dota2CommandTrait;

class GetRealtimeStats implements CommandInterface
{
    /**
     * @param int $serverSteamId
     */
    public function __construct(
        private int $serverSteamId
    ) {}

    /**
     * @return string
     */
    public function getInterface(): string
    {
        return 'IDOTA2MatchStats_570';
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return 'GetRealtimeStats';
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
        return [
            'server_steam_id' => $this->serverSteamId,
        ];
    }
}