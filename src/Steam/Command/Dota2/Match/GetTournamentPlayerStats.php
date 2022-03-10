<?php

namespace SquegTech\Steam\Command\Dota2\Match;

use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Traits\Dota2CommandTrait;

class GetTournamentPlayerStats implements CommandInterface
{
    use Dota2CommandTrait;

    /**
     * @var int
     */
    private int $leagueId;

    /**
     * @var int
     */
    private int $heroId;

    /**
     * @var int
     */
    private int $matchId;

    /**
     * @param int $accountId
     */
    public function __construct(
        private int $accountId
    ) {}

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
     * @param int $heroId
     * @return $this
     */
    public function setHeroId(int $heroId): static
    {
        $this->heroId = $heroId;
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
        return 'GetTournamentPlayerStats';
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
            'account_id' => $this->accountId,
        ];

        if (isset($this->leagueId)) {
            $params['league_id'] = $this->leagueId;
        }

        if (isset($this->heroId)) {
            $params['hero_id'] = $this->heroId;
        }

        if (isset($this->matchId)) {
            $params['match_id'] = $this->matchId;
        }

        return $params;
    }
}