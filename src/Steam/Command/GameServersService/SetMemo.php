<?php

namespace SquegTech\Steam\Command\GameServersService;

use SquegTech\Steam\Command\CommandInterface;

class SetMemo implements CommandInterface
{
    /**
     * @param int $steamId
     * @param string $memo
     */
    public function __construct(
        private int $steamId,
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
        return 'SetMemo';
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
            'steamid' => $this->steamId,
            'memo' => $this->memo,
        ];
    }
}
