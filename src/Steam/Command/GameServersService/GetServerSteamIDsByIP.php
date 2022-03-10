<?php

namespace SquegTech\Steam\Command\GameServersService;

use SquegTech\Steam\Command\CommandInterface;

class GetServerSteamIDsByIP implements CommandInterface
{
    /**
     * @param string $serverIp
     */
    public function __construct(
        private string $serverIp
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
        return 'GetServerSteamIDsByIP';
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
     * @return string[]
     */
    public function getParams(): array
    {
        return [
            'server_ips' => $this->serverIp,
        ];
    }
}
