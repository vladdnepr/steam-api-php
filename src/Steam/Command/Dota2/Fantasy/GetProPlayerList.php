<?php

namespace SquegTech\Steam\Command\Dota2\Fantasy;

use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Traits\Dota2CommandTrait;

class GetProPlayerList implements CommandInterface
{
    use Dota2CommandTrait;

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
        return 'GetProPlayerList';
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
        return [];
    }
}
