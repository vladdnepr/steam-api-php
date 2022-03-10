<?php

namespace SquegTech\Steam\Command\Version;

use SquegTech\Steam\Command\CommandInterface;

class GetServerVersion implements CommandInterface
{
    /**
     * @param int $appId
     */
    public function __construct(
        private int $appId
    ) {}

    /**
     * @return string
     */
    public function getInterface(): string
    {
        return 'IGCVersion_' . $this->appId;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return 'GetServerVersion';
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
     * @return string
     */
    public function getParams(): array
    {
        return [];
    }
}