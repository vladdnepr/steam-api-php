<?php

namespace SquegTech\Steam\Command\AccountRecoveryService;

use SquegTech\Steam\Command\CommandInterface;

class ReportAccountRecoveryData implements CommandInterface
{
    /**
     * @param string $loginUserList
     * @param string $installConfig
     * @param string $shaSentryFile
     * @param string $machineId
     */
    public function __construct (
        private string $loginUserList,
        private string $installConfig,
        private string $shaSentryFile,
        private string $machineId
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
        return 'ReportAccountRecoveryData';
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
            'loginuser_list' => $this->loginUserList,
            'install_config' => $this->installConfig,
            'shasentryfile' => $this->shaSentryFile,
            'machineid' => $this->machineId,
        ];
    }
}
