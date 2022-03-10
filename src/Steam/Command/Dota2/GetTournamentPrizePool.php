<?php

namespace SquegTech\Steam\Command\Dota2;

use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Traits\Dota2CommandTrait;

class GetTournamentPrizePool implements CommandInterface
{
    use Dota2CommandTrait;

    /**
     * @param int $leagueId
     */
    public function __construct(
        private int $leagueId
    ) {}

    /**
     * @return string
     */
    public function getInterface(): string
    {
        return 'IEconDOTA2_' . $this->getDota2AppId()->value;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return 'GetTournamentPrizePool';
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
            'leagueid' => $this->leagueId,
        ];
    }
}