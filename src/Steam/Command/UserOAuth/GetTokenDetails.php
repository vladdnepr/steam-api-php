<?php

namespace SquegTech\Steam\Command\UserOAuth;

use SquegTech\Steam\Command\CommandInterface;

class GetTokenDetails implements CommandInterface
{
    /**
     * @param string $accessToken
     */
    public function __construct(
        private string $accessToken
    ) {}

    /**
     * @return string
     */
    public function getInterface(): string
    {
        return 'ISteamUserOAuth';
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return 'GetTokenDetails';
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
            'access_token' => $this->accessToken,
        ];
    }
}
