<?php

namespace SquegTech\Steam\Command\Apps;

use SquegTech\Steam\Command\CommandInterface;

class UpToDateCheck implements CommandInterface
{
    /**
     * @param int $appId AppID of game.
     * @param int $version The installed version of the game.
     */
    public function __construct(
        private int $appId,
        private int $version
    ) {}

    /**
     * @return string
     */
    public function getInterface(): string
    {
        return 'ISteamApps';
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return 'UpToDateCheck';
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
            'appId' => $this->appId,
            'version' => $this->version,
        ];
    }
}