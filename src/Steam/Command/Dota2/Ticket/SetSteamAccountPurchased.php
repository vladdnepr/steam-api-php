<?php

namespace SquegTech\Steam\Command\Dota2\Ticket;

use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Traits\Dota2CommandTrait;

class SetSteamAccountPurchased implements CommandInterface
{
    use Dota2CommandTrait;

    /**
     * @param int $eventId
     * @param int $steamId
     */
    public function __construct(
        private int $eventId,
        private int $steamId
    ) {}

    /**
     * @return string
     */
    public function getInterface(): string
    {
        return 'IDOTA2Ticket_' . $this->getDota2AppId()->value;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return 'SetSteamAccountPurchased';
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
     * @return array
     */
    public function getParams(): array
    {
        return [
            'eventid' => $this->eventId,
            'steamid' => $this->steamId,
        ];
    }
}
