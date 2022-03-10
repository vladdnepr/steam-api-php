<?php

namespace SquegTech\Steam\Command\GameServersService;

use SquegTech\Steam\Command\CommandInterface;

class GetServerIPsBySteamID implements CommandInterface
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
        return 'IGameServersService';
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return 'GetServerIPsBySteamID';
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
            'server_steamids' => $this->serverSteamId,
        ];
    }
}
