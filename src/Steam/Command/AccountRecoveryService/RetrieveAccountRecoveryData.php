<?php

namespace SquegTech\Steam\Command\AccountRecoveryService;

use SquegTech\Steam\Command\CommandInterface;

class RetrieveAccountRecoveryData implements CommandInterface
{
    /**
     * @param string $requestHandle
     */
    public function __construct(
        private string $requestHandle
    ) {}

    /**
     * @return string
     */
    public function getInterface(): string
    {
        return 'IAccountRecoveryService';
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return 'RetrieveAccountRecoveryData';
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
     * @return string[]
     */
    public function getParams(): array
    {
        return [
            'requesthandle' => $this->requestHandle,
        ];
    }
}
