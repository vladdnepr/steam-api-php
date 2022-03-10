<?php

namespace SquegTech\Steam\Command\Dota2\StreamSystem;

use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Traits\Dota2CommandTrait;

class GetBroadcasterInfo implements CommandInterface
{
    /**
     * @param int $broadcasterStreamId
     * @param int|null $leagueId
     */
    public function __construct(
        private int $broadcasterStreamId,
        private int|null $leagueId = null
    ) {}

    /**
     * @param int $leagueId
     * @return $this
     */
    public function setLeagueId(int $leagueId): static
    {
        $this->leagueId = $leagueId;
    }

    /**
     * @return string
     */
    public function getInterface(): string
    {
        return 'IDOTA2StreamSystem_570';
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return 'GetBroadcasterInfo';
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
        $params = [
            'broadcaster_steam_id' => $this->broadcasterStreamId,
        ];

        if (isset($this->leagueId)) {
            $params['league_id'] = $this->leagueId;
        }

        return $params;
    }
}