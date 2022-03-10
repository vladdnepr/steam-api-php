<?php

namespace SquegTech\Steam\Command\Dota2\Match;

use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Traits\Dota2CommandTrait;

class GetLiveLeagueGames implements CommandInterface
{
    use Dota2CommandTrait;

    /**
     * @var int
     */
    private int $leagueId;

    /**
     * @var int
     */
    private int $matchId;

    /**
     * @param int $leagueId
     * @return $this
     */
    public function setLeagueId(int $leagueId): static
    {
        $this->leagueId = $leagueId;
        return $this;
    }

    /**
     * @param int $matchId
     * @return $this
     */
    public function setMatchId(int $matchId): static
    {
        $this->matchId = $matchId;
        return $this;
    }

    /**
     * @return string
     */
    public function getInterface(): string
    {
        return 'IDOTA2Match_' . $this->getDota2AppId()->value;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return 'GetLiveLeagueGames';
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
        $params = [];

        if (isset($this->leagueId)) {
            $params['league_id'] = $this->leagueId;
        }

        if (isset($this->matchId)) {
            $params['match_id'] = $this->matchId;
        }

        return $params;
    }
}