<?php

namespace SquegTech\Steam\Command\Dota2\Match;

use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Traits\Dota2CommandTrait;

class GetMatchHistoryBySequenceNum implements CommandInterface
{
    use Dota2CommandTrait;

    /**
     * @var int
     */
    private int $startAtMatchSeqNum;

    /**
     * @var int
     */
    private int $matchesRequested;

    /**
     * @param int $startAtMatchSeqNum
     * @return $this
     */
    public function setStartAtMatchSeqNum(int $startAtMatchSeqNum): static
    {
        $this->startAtMatchSeqNum = $startAtMatchSeqNum;
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
        return 'GetMatchHistoryBySequenceNum';
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

        if (isset($this->startAtMatchSeqNum)) {
            $params['start_at_match_seq_num'] = $this->startAtMatchSeqNum;
        }

        if (isset($this->matchesRequested)) {
            $params['matches_requested'] = $this->matchesRequested;
        }

        return $params;
    }
}