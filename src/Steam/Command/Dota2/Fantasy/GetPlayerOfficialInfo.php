<?php

namespace SquegTech\Steam\Command\Dota2\Fantasy;

use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Traits\Dota2CommandTrait;

class GetPlayerOfficialInfo implements CommandInterface
{
    use Dota2CommandTrait;

    /**
     * @param int $accountId
     */
    public function __construct(
        private int $accountId
    ) {}

    /**
     * @return string
     */
    public function getInterface(): string
    {
        return 'IDOTA2Fantasy_' . $this->getDota2AppId()->value;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return 'GetPlayerOfficialInfo';
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
            'accountid' => $this->accountId,
        ];
    }
}
