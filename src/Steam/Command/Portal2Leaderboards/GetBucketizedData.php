<?php

namespace SquegTech\Steam\Command\Portal2Leaderboards;

use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Traits\Portal2CommandTrait;

class GetBucketizedData implements CommandInterface
{
    use Portal2CommandTrait;

    /**
     * @param string $leaderboardName
     */
    public function __construct(
        private string $leaderboardName
    ) {}

    /**
     * @return string
     */
    public function getInterface(): string
    {
        return 'IPortal2Leaderboards_' . $this->getPortal2AppId()->value;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return 'GetBucketizedData';
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
     * @return string[]
     */
    public function getParams(): array
    {
        return [
            'leaderboardName' => $this->leaderboardName,
        ];
    }
}
