<?php

namespace SquegTech\Steam\Command\CSGOServers;

use SquegTech\Steam\Command\CommandInterface;

class GetGameServersStatus implements CommandInterface
{
    /**
     * @return string
     */
    public function getInterface(): string
    {
        return 'ICSGOServers_730';
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return 'GetGameServersStatus';
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