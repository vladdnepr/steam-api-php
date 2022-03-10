<?php

namespace SquegTech\Steam\Command\GameServersService;

use SquegTech\Steam\Command\CommandInterface;

class GetServerList implements CommandInterface
{
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
        return 'GetServerList';
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
        return [];
    }
}
