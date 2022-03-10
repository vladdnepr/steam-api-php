<?php

namespace SquegTech\Steam\Command\EconItems;

use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\HasLanguage;

class GetSchemaItems implements CommandInterface
{
    use HasLanguage;

    /**
     * @var int
     */
    private int $start;

    /**
     * @param int $appId
     */
    public function __construct(
        private int $appId
    ) {}

    /**
     * The first item id to return. Defaults to 0. Response will indicate next value to query if applicable.
     *
     * @param int $start
     * @return $this
     */
    public function setStart(int $start): static
    {
        $this->start = $start;
        return $this;
    }

    /**
     * @return string
     */
    public function getInterface(): string
    {
        return 'IEconItems_' . $this->appId;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return 'GetSchemaItems';
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

        empty($this->language) ?: $params['language'] = $this->language;
        empty($this->start) ?: $params['start'] = $this->start;

        return $params;
    }
}