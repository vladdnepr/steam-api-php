<?php

namespace SquegTech\Steam\Command\EconService;

use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\HasLanguage;

class GetTradeOffer implements CommandInterface
{
    use HasLanguage;

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
        return 'GetTradeOffer';
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
     * @return int[]
     */
    public function getParams(): array
    {
        $params = [
            'tradeofferid' => $this->tradeOfferId,
        ];

        empty($this->language) ?: $params['language'] = $this->language;

        return $params;
    }
}
