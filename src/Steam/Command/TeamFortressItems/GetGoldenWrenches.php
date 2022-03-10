<?php

namespace SquegTech\Steam\Command\TeamFortressItems;

use SquegTech\Steam\Command\CommandInterface;

class GetGoldenWrenches implements CommandInterface
{
    /**
     * @return string
     */
    public function getInterface(): string
    {
        return 'ITFItems_440';
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return 'GetGoldenWrenches';
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