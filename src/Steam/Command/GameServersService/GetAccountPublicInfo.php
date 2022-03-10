<?php

namespace SquegTech\Steam\Command\GameServersService;

use SquegTech\Steam\Command\CommandInterface;

class GetAccountPublicInfo implements CommandInterface
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
        return 'IGameServersService';
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return 'GetAccountPublicInfo';
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
