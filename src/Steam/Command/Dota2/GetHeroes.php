<?php

namespace SquegTech\Steam\Command\Dota2;

use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Traits\Dota2CommandTrait;

class GetHeroes implements CommandInterface
{
    use Dota2CommandTrait;

    /**
     * @var bool
     */
    private bool $itemizedHeroesOnly = false;

    /**
     * @param bool $itemizedHeroesOnly
     * @return $this
     */
    public function setItemizedHeroesOnly(bool $itemizedHeroesOnly): static
    {
        $this->itemizedHeroesOnly = $itemizedHeroesOnly;
        return $this;
    }

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
        return 'GetHeroes';
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
            'itemizedonly' => $this->itemizedHeroesOnly
        ];

        if (isset($this->language)) {
            $params['language'] = $this->language;
        }

        return $params;
    }
}