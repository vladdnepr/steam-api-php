<?php

namespace SquegTech\Steam\Command\Economy;

use SquegTech\Steam\Command\HasLanguage;
use SquegTech\Steam\Command\CommandInterface;

class GetAssetPrices implements CommandInterface
{
    use HasLanguage;

    /**
     * @param int $appId
     * @param string $currency
     */
    public function __construct(
        private int $appId,
        private string $currency = ''
    ) {}

    /**
     * @param string $currency
     * @return $this
     */
    public function setCurrency(string $currency): static
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @return string
     */
    public function getInterface(): string
    {
        return 'ISteamEconomy';
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return 'GetAssetPrices';
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
            'appid' => $this->appId,
        ];

        empty($this->currency) ?: $params['currency'] = $this->currency;
        empty($this->language) ?: $params['language'] = $this->language;

        return $params;
    }
}