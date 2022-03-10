<?php

namespace SquegTech\Steam\Command\UserStats;

use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\HasLanguage;

class GetSchemaForGame implements CommandInterface
{
    use HasLanguage;

    /**
     * @param int $appId
     */
    public function __construct(
        private int $appId
    ) {}

    /**
     * @return string
     */
    public function getInterface(): string
    {
        return 'ISteamUserStats';
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return 'GetSchemaForGame';
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return 'v2';
    }

    /**
     * @return string
     */
    public function getRequestMethod(): string
    {
        return 'GET';
    }

    public function getParams(): array
    {
        $params = [
            'appid' => $this->appId,
        ];

        if (isset($this->language)) {
            $params['l'] = $this->language;
        }

        return $params;
    }
}