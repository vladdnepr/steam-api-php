<?php

namespace SquegTech\Steam\Command\RemoteStorage;

use SquegTech\Steam\Command\CommandInterface;

class GetUGCFileDetails implements CommandInterface
{
    /**
     * @var int
     */
    private int $steamId;

    /**
     * @param int $appId
     * @param int|string $ugcId
     */
    public function __construct(
        private int $appId,
        private int|string $ugcId
    ) {}

    /**
     * @param int $steamId
     * @return $this
     */
    public function setSteamId(int $steamId): static
    {
        $this->steamId = $steamId;
        return $this;
    }

    /**
     * @return string
     */
    public function getInterface(): string
    {
        return 'ISteamRemoteStorage';
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return 'GetUGCFileDetails';
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
            'ugcid' => $this->ugcId,
        ];

        if (isset($this->steamId)) {
            $params['steamid'] = $this->steamId;
        }

        return $params;
    }
}
