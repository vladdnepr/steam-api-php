<?php

namespace SquegTech\Steam\Command\GameServersService;

use SquegTech\Steam\Command\CommandInterface;

class CreateAccount implements CommandInterface
{
    /**
     * @param int $appId
     * @param string $memo
     */
    public function __construct(
        private int $appId,
        private string $memo
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
        return 'CreateAccount';
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
        return 'POST';
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return [
            'appid' => $this->appId,
            'memo' => $this->memo,
        ];
    }
}
