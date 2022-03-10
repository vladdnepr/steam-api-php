<?php

namespace SquegTech\Steam\Command\PlayerService;

use SquegTech\Steam\Command\CommandInterface;

class GetSteamLevel implements CommandInterface
{
    /**
     * @param int $steamId
     */
    public function __construct(
        private int $steamId
    ) {}

    /**
     * @return string
     */
    public function getInterface(): string
    {
        return 'IPlayerService';
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return 'GetSteamLevel';
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
        return [
            'steamid' => $this->steamId,
        ];
    }
}