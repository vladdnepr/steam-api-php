<?php

namespace SquegTech\Steam\Command\User;

use SquegTech\Steam\Command\CommandInterface;

class GetPlayerBans implements CommandInterface
{
    /**
     * @param array $steamIds
     */
    public function __construct(
        private array $steamIds
    ) {}

    /**
     * @return string
     */
    public function getInterface(): string
    {
        return 'ISteamUser';
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return 'GetPlayerBans';
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
            'steamids' => implode(',', $this->steamIds)
        ];
    }
}