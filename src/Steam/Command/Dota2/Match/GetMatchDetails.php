<?php

namespace SquegTech\Steam\Command\Dota2\Match;

use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Traits\Dota2CommandTrait;

class GetMatchDetails implements CommandInterface
{
    use Dota2CommandTrait;

    /**
     * @param int $matchId
     */
    public function __construct(
        private int $matchId
    ) {}

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
        return 'GetMatchDetails';
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
            'match_id' => $this->matchId,
        ];
    }
}