<?php

namespace SquegTech\Steam\Command\EconItems;

use SquegTech\Steam\Command\CommandInterface;

class GetPlayerItems implements CommandInterface
{
    /**
     * @param int $appId
     * @param int $steamId
     */
    public function __construct(
        private int $appId,
        private int $steamId
    ) {}

    /**
     * @return string
     */
    public function getInterface(): string
    {
        return 'IEconItems_' . $this->appId;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return 'GetPlayerItems';
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