<?php

namespace SquegTech\Steam\Command\Dota2;

use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Traits\Dota2CommandTrait;

class GetEmoticons implements CommandInterface
{
    use Dota2CommandTrait;

    /**
     * @return string
     */
    public function getInterface(): string
    {
        return 'IEconDOTA2_' . $this->getDota2AppId()->value;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return 'GetEmoticons';
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