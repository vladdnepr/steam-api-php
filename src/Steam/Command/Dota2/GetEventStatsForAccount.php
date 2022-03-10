<?php

namespace SquegTech\Steam\Command\Dota2;

use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\HasLanguage;
use SquegTech\Steam\Traits\Dota2CommandTrait;

class GetEventStatsForAccount implements CommandInterface
{
    use Dota2CommandTrait,
        HasLanguage;

    /**
     * @param int $eventId
     * @param int $accountId
     */
    public function __construct(
        private int $eventId,
        private int $accountId
    ) {}

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
        return 'GetEventStatsForAccount';
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
            'eventid' => $this->eventId,
            'accountid' => $this->accountId,
        ];

        if (isset($this->language)) {
            $params['language'] = $this->language;
        }

        return $params;
    }
}