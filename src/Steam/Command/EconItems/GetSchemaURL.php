<?php

namespace SquegTech\Steam\Command\EconItems;

use SquegTech\Steam\Command\CommandInterface;

class GetSchemaURL implements CommandInterface
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
        return 'IEconItems_' . $this->appId;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return 'GetSchemaURL';
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