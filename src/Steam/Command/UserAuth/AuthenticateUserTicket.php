<?php

namespace SquegTech\Steam\Command\UserAuth;

use SquegTech\Steam\Command\CommandInterface;

class AuthenticateUserTicket implements CommandInterface
{
    /**
     * @param int $appId
     * @param string $ticket
     */
    public function __construct(
        private int $appId,
        private string $ticket
    ) {}

    /**
     * @return string
     */
    public function getInterface(): string
    {
        return 'ISteamUserAuth';
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return 'AuthenticateUserTicket';
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
         return [
            'appid' => $this->appId,
            'ticket' => $this->ticket,
        ];
    }
}
