<?php

namespace SquegTech\Steam\Command\Promos;

use SquegTech\Steam\Command\CommandInterface;

class GetItemId implements CommandInterface
{
    /**
     * @param int $appId
     * @param int $steamId
     * @param int $promoId
     */
    public function __construct(
        private int $appId,
        private int $steamId,
        private int $promoId
    ) {}

    /**
     * @return string
     */
    public function getInterface(): string
    {
        return 'ITFPromos_' . $this->appId;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return 'GetItemID';
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
            'steamid' => $this->steamId,
            'promoid' => $this->promoId,
        ];
    }
}