<?php

namespace SquegTech\Steam\Command\WebApiUtil;

use SquegTech\Steam\Command\CommandInterface;

class GetSupportedApiList implements CommandInterface
{
    /**
     * @return string
     */
    public function getInterface(): string
    {
        return 'ISteamWebAPIUtil';
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return 'GetSupportedAPIList';
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