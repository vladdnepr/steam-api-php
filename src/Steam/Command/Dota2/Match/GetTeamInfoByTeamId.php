<?php

namespace SquegTech\Steam\Command\Dota2\Match;

use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Traits\Dota2CommandTrait;

class GetTeamInfoByTeamId implements CommandInterface
{
    use Dota2CommandTrait;

    /**
     * @var int
     */
    private int $startAtTeamId;

    /**
     * @var int
     */
    private int $teamsRequested;

    /**
     * @param int $startAtTeamId
     * @return $this
     */
    public function setStartAtTeamId(int $startAtTeamId): static
    {
        $this->startAtTeamId = $startAtTeamId;
        return $this;
    }

    /**
     * @param int $teamsRequested
     * @return $this
     */
    public function setTeamsRequested(int $teamsRequested): static
    {
        $this->teamsRequested = $teamsRequested;
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
        return 'GetTeamInfoByTeamID';
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

        if (isset($this->startAtTeamId)) {
            $params['start_at_team_id'] = $this->startAtTeamId;
        }

        if (isset($this->teamsRequested)) {
            $params['teams_requested'] = $this->teamsRequested;
        }

        return $params;
    }
}