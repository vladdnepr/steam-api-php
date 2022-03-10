<?php

namespace SquegTech\Steam\Command\PlayerService;

use SquegTech\Steam\Command\CommandInterface;

class GetRecentlyPlayedGames implements CommandInterface
{
    /**
     * @param int $steamId
     * @param int $count
     */
    public function __construct(
        private int $steamId,
        private int $count = 0
    ) {}

    /**
     * @param int $count
     * @return $this
     */
    public function setCount(int $count): static
    {
        $this->count = $count;
        return $this;
    }

    /**
     * @return string
     */
    public function getInterface(): string
    {
        return 'IPlayerService';
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return 'GetRecentlyPlayedGames';
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
            'steamid' => $this->steamId,
            'count' => $this->count,
        ];
    }
}