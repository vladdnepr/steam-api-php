<?php

namespace SquegTech\Steam\Command\User;

use SquegTech\Steam\Command\CommandInterface;

class GetFriendList implements CommandInterface
{
    /**
     * @var string
     */
    private string $relationship;

    /**
     * @param int $steamId
     */
    public function __construct(
        private int $steamId
    ) {}

    /**
     * @param string $relationship
     * @return $this
     */
    public function setRelationship(string $relationship): static
    {
        $this->relationship = $relationship;
        return $this;
    }

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
        return 'GetFriendList';
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

    public function getParams(): array
    {
        $params = [
            'steamid' => $this->steamId
        ];

        if (isset($this->relationship)) {
            $params['relationship'] = $this->relationship;
        }

        return $params;
    }
}