<?php

namespace SquegTech\Steam\Command\Apps;

use SquegTech\Steam\Command\CommandInterface;

class GetAppList implements CommandInterface
{
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
        return 'GetAppList';
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
        return [];
    }
}