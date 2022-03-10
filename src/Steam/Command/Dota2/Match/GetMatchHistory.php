<?php

namespace SquegTech\Steam\Command\Dota2\Match;

use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Enums\Dota2GameMode;
use SquegTech\Steam\Enums\SkillLevel;
use SquegTech\Steam\Traits\Dota2CommandTrait;

class GetMatchHistory implements CommandInterface
{
    use Dota2CommandTrait;

    /**
     * The ID of the hero that must be in the matches being queried.
     *
     * @var int
     */
    private int $heroId;

    /**
     * Which game mode to return matches for.
     *
     * @var Dota2GameMode
     */
    private Dota2GameMode $gameMode;

    /**
     * The average skill range of the match, these can be [1-3] with lower numbers being lower skill.
     *
     * Ignored if an account ID is specified.
     *
     * @var SkillLevel
     */
    private SkillLevel $skill;

    /**
     * Minimum number of human players that must be in a match for it to be returned.
     *
     * @var int
     */
    private int $minPlayers;

    /**
     * An account ID to get matches from. This will fail if the user has their match history hidden.
     *
     * @var string
     */
    private string $accountId;

    /**
     * The league ID to return games from.
     *
     * @var int
     */
    private int $leagueId;

    /**
     * The minimum match ID to start from
     *
     * @var int
     */
    private int $startAtMatchId;

    /**
     * The number of requested matches to return.
     *
     * @var int
     */
    private int $matchesRequested;

    /**
     * Whether or not tournament games should only be returned.
     *
     * @var bool
     */
    private bool $tournamentMatchesOnly;

    /**
     * @param string $accountId
     * @return $this
     */
    public function setAccountId(string $accountId): static
    {
        $this->accountId = $accountId;
        return $this;
    }

    /**
     * @param Dota2GameMode $gameMode
     * @return $this
     */
    public function setGameMode(Dota2GameMode $gameMode): static
    {
        $this->gameMode = $gameMode;
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
     * @param int $leagueId
     * @return $this
     */
    public function setLeagueId(int $leagueId): static
    {
        $this->leagueId = $leagueId;
        return $this;
    }

    /**
     * @param int $matchesRequested
     * @return $this
     */
    public function setMatchesRequested(int $matchesRequested): static
    {
        $this->matchesRequested = $matchesRequested;
        return $this;
    }

    /**
     * @param int $minPlayers
     * @return $this
     */
    public function setMinPlayers(int $minPlayers): static
    {
        $this->minPlayers = $minPlayers;
        return $this;
    }

    /**
     * @param SkillLevel $skill
     * @return $this
     */
    public function setSkill(SkillLevel $skill): static
    {
        $this->skill = $skill;
        return $this;
    }

    /**
     * @param int $startAtMatchId
     * @return $this
     */
    public function setStartAtMatchId(int $startAtMatchId): static
    {
        $this->startAtMatchId = $startAtMatchId;
        return $this;
    }

    /**
     * @param bool $tournamentMatchesOnly
     * @return $this
     */
    public function setTournamentMatchesOnly(bool $tournamentMatchesOnly): static
    {
        $this->tournamentMatchesOnly = $tournamentMatchesOnly;
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
        return 'GetMatchHistory';
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

        if (isset($this->heroId)) {
            $params['hero_id'] = $this->heroId;
        }

        if (isset($this->gameMode)) {
            $params['game_mode'] = $this->gameMode->value;
        }

        if (isset($this->skill)) {
            $params['skill'] = $this->skill->value;
        }

        if (isset($this->minPlayers)) {
            $params['min_players'] = $this->minPlayers;
        }

        if (isset($this->accountId)) {
            $params['account_id'] = $this->accountId;
        }

        if (isset($this->leagueId)) {
            $params['league_id'] = $this->leagueId;
        }

        if (isset($this->startAtMatchId)) {
            $params['start_at_match_id'] = $this->startAtMatchId;
        }

        if (isset($this->matchesRequested)) {
            $params['matches_requested'] = $this->matchesRequested;
        }

        if (isset($this->tournamentMatchesOnly)) {
            $params['tournament_games_only'] = $this->tournamentMatchesOnly;
        }

        return $params;
    }
}