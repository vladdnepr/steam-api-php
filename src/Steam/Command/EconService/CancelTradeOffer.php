<?php

namespace SquegTech\Steam\Command\EconService;

use SquegTech\Steam\Command\CommandInterface;

class CancelTradeOffer implements CommandInterface
{
    /**
     * @param int $tradeOfferId
     */
    public function __construct(
        private int $tradeOfferId
    ) {}

    /**
     * @return string
     */
    public function getInterface(): string
    {
        return 'IEconService';
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return 'CancelTradeOffer';
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
        return 'POST';
    }

    /**
     * @return int[]
     */
    public function getParams(): array
    {
        return [
            'tradeofferid' => $this->tradeOfferId,
        ];
    }
}
