<?php

namespace SquegTech\Steam;

use SquegTech\Steam\Exception\InvalidConfigOptionException;

class Configuration
{
    public const STEAM_KEY = 'steam_key';
    private const BASE_STEAM_API_URL = 'base_steam_api_url';

    /**
     * @var array
     */
    private array $options = [
        self::STEAM_KEY => '',
        self::BASE_STEAM_API_URL => Steam::BASE_URL,
    ];

    /**
     * @param array $options
     * @throws InvalidConfigOptionException
     */
    public function __construct(array $options = [])
    {
        $this->setOptions($options);
    }

    /**
     * @param array $options
     * @return void
     * @throws InvalidConfigOptionException
     */
    public function setOptions(array $options): void
    {
        foreach($options as $key => $value) {
            if(!array_key_exists($key, $this->options)) {
                throw new InvalidConfigOptionException(sprintf('"%s" is an invalid configuration option', $key));
            }

            $this->options[$key] = $value;
        }
    }

    /**
     * @param string $appKey
     * @return $this
     */
    public function setSteamKey(string $appKey): static
    {
        $this->options[self::STEAM_KEY] = $appKey;
        return $this;
    }

    /**
     * @return string
     */
    public function getSteamKey(): string
    {
        return $this->options[self::STEAM_KEY];
    }

    /**
     * @return string
     */
    public function getBaseSteamApiUrl(): string
    {
        return $this->options[self::BASE_STEAM_API_URL];
    }
}