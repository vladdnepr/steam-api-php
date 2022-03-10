<?php

namespace SquegTech\Steam\Command\GameServersService;

use SquegTech\Steam\Command\CommandInterface;

class QueryLoginToken implements CommandInterface
{
    /**
     * @param string $loginToken
     */
    public function __construct(
        private string $loginToken
    ) {}

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
        return 'QueryLoginToken';
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
            'login_token' => $this->loginToken,
        ];
    }
}
