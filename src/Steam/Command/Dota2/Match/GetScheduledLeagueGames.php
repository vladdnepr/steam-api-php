<?php

namespace SquegTech\Steam\Command\Dota2\Match;

use DateTime;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Traits\Dota2CommandTrait;

class GetScheduledLeagueGames implements CommandInterface
{
    use Dota2CommandTrait;

    /**
     * @var DateTime
     */
    private DateTime $dateMin;

    /**
     * @var DateTime
     */
    private DateTime $dateMax;

    /**
     * @param DateTime $dateMin
     * @return $this
     */
    public function setDateMin(DateTime $dateMin): static
    {
        $this->dateMin = $dateMin;
        return $this;
    }

    /**
     * @param DateTime $dateMax
     * @return $this
     */
    public function setDateMax(DateTime $dateMax): static
    {
        $this->dateMax = $dateMax;
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
        return 'GetScheduledLeagueGames';
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

        if (isset($this->dateMin)) {
            $params['date_min'] = $this->dateMin->getTimestamp();
        }

        if (isset($this->dateMax)) {
            $params['date_max'] = $this->dateMax->getTimestamp();
        }

        return $params;
    }
}