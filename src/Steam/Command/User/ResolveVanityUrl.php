<?php

namespace SquegTech\Steam\Command\User;

use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Enums\UrlType;

class ResolveVanityUrl implements CommandInterface
{
    /**
     * @param string $vanityUrl
     * @param UrlType $urlType
     */
    public function __construct(
        private string $vanityUrl,
        private UrlType $urlType = UrlType::INDIVIDUAL_PROFILE
    ) {}

    /**
     * @return string
     */
    public function getInterface(): string
    {
        return 'ISteamUser';
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return 'ResolveVanityURL';
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
    public function getParams():array
    {
        return [
            'vanityurl' => $this->vanityUrl,
            'url_type' => $this->urlType->value,
        ];
    }
}