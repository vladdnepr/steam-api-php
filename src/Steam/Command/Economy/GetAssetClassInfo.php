<?php

namespace SquegTech\Steam\Command\Economy;

use SquegTech\Steam\Command\HasLanguage;
use SquegTech\Steam\Command\CommandInterface;

class GetAssetClassInfo implements CommandInterface
{
    use HasLanguage;

    /**
     * @param int $appId
     * @param array $classIds
     * @param array $instanceIds
     */
    public function __construct(
        private int $appId,
        private array $classIds,
        private array $instanceIds = []
    ) {}

    /**
     * @param array $instanceIds
     * @return $this
     */
    public function setInstanceIds(array $instanceIds): static
    {
        $this->instanceIds = $instanceIds;
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
        return 'GetAssetClassInfo';
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
            'appid' => $this->appId,
            'class_count' => count($this->classIds),
        ];

        empty($this->language) ?: $params['language'] = $this->language;

        foreach($this->classIds as $key => $classId) {
            $params['classid' . $key] = $classId;
        }

        foreach($this->instanceIds as $key => $instanceId) {
            $params['instanceid' . $key] = $instanceId;
        }

        return $params;
    }
}