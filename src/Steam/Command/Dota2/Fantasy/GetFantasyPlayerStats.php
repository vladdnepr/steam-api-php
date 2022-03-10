<?php

namespace SquegTech\Steam\Command\Dota2\Fantasy;

use DateTime;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Traits\Dota2CommandTrait;

class GetFantasyPlayerStats implements CommandInterface
{
    use Dota2CommandTrait;

    /**
     * @var DateTime
     */
    private DateTime $startTime;

    /**
     * @var DateTime
     */
    private DateTime $endTime;

    /**
     * @var int
     */
    private int $matchId;

    /**
     * @var int
     */
    private int $seriesId;

    /**
     * @var int
     */
    private int $playerAccountId;

    /**
     * @param int $fantasyLeagueId
     */
    public function __construct(
        private int $fantasyLeagueId
    ) {}

    /**
     * @param DateTime $startTime
     * @return $this
     */
    public function setStartTime(DateTime $startTime): static
    {
        $this->startTime = $startTime;
        return $this;
    }

    /**
     * @param DateTime $endTime
     * @return $this
     */
    public function setEndTime(DateTime $endTime): static
    {
        $this->endTime = $endTime;
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
     * @param int $seriesId
     * @return $this
     */
    public function setSeriesId(int $seriesId): static
    {
        $this->seriesId = $seriesId;
        return $this;
    }

    /**
     * @param int $playerAccountId
     * @return $this
     */
    public function setPlayerAccountId(int $playerAccountId): static
    {
        $this->playerAccountId = $playerAccountId;
        return $this;
    }

    /**
     * @return string
     */
    public function getInterface(): string
    {
        return 'IDOTA2Fantasy_' . $this->getDota2AppId()->value;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return 'GetFantasyPlayerStats';
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
            'FantasyLeagueID' => $this->fantasyLeagueId,
        ];

        if (isset($this->startTime)) {
            $params['StartTime'] = $this->startTime->getTimestamp();
        }

        if (isset($this->endTime)) {
            $params['EndTime'] = $this->endTime->getTimestamp();
        }

        if (isset($this->matchId)) {
            $params['matchid'] = $this->matchId;
        }

        if (isset($this->seriesId)) {
            $params['SeriesID'] = $this->seriesId;
        }

        if (isset($this->playerAccountId)) {
            $params['PlayerAccountID'] = $this->playerAccountId;
        }

        return $params;
    }
}
