<?php

namespace SquegTech\Steam\Command\PlayerService;

use SquegTech\Steam\Command\CommandInterface;

class GetOwnedGames implements CommandInterface
{
    /**
     * @var bool
     */
    private bool $includeAppInfo;

    /**
     * @var bool
     */
    private bool $includeFreeGames;

    /**
     * @var array
     */
    private array $appIdsFilter;

    /**
     * @param int $steamId
     */
    public function __construct(
        private int $steamId
    ) {}

    /**
     * @param array $appIdsFilter
     * @return $this
     */
    public function setAppIdsFilter(array $appIdsFilter): static
    {
        $this->appIdsFilter = $appIdsFilter;
        return $this;
    }

    /**
     * @param bool $includeAppInfo
     * @return $this
     */
    public function setIncludeAppInfo(bool $includeAppInfo): static
    {
        $this->includeAppInfo = $includeAppInfo;
        return $this;
    }

    /**
     * @param bool $includeFreeGames
     * @return $this
     */
    public function setIncludeFreeGames(bool $includeFreeGames): static
    {
        $this->includeFreeGames = $includeFreeGames;
        return $this;
    }

    /**
     * @return string
     */
    public function getInterface(): string
    {
        return 'IPlayerService';
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return 'GetOwnedGames';
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
        $params =  [
            'steamid' => $this->steamId,
        ];

        if (isset($this->includeAppInfo)) {
            $params['include_appinfo'] = $this->includeAppInfo;
        }

        if (isset($this->includeFreeGames)) {
            $params['include_played_free_games'] = $this->includeFreeGames;
        }

        if ($this->appIdsFilter) {
            $params['appids_filter'] = $this->appIdsFilter;
        }

        return $params;
    }
}