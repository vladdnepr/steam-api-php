<?php

namespace SquegTech\Steam\Command\PlayerService;

use SquegTech\Steam\Command\CommandInterface;

class GetCommunityBadgeProgress implements CommandInterface
{
    /**
     * @param int $steamId
     * @param int $badgeId
     */
    public function __construct(
        private int $steamId,
        private int $badgeId
    ) {}

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
        return 'GetCommunityBadgeProgress';
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
            'badgeid' => $this->badgeId,
        ];
    }
}