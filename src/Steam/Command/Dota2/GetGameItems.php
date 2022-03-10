<?php

namespace SquegTech\Steam\Command\Dota2;

use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\HasLanguage;
use SquegTech\Steam\Traits\Dota2CommandTrait;

class GetGameItems implements CommandInterface
{
    use Dota2CommandTrait,
        HasLanguage;

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
        return 'GetGameItems';
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

        if (isset($this->language)) {
            $params['language'] = $this->language;
        }

        return $params;
    }
}