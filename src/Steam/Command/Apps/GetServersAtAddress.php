<?php

namespace SquegTech\Steam\Command\Apps;

use SquegTech\Steam\Command\CommandInterface;

class GetServersAtAddress implements CommandInterface
{
    /**
     * @param string $address
     */
    public function __construct(
        private string $address
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
        return 'GetServersAtAddress';
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
            'addr' => $this->address,
        ];
    }
}
