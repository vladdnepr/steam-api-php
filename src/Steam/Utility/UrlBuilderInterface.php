<?php

namespace SquegTech\Steam\Utility;

use SquegTech\Steam\Command\CommandInterface;
use GuzzleHttp\Psr7\Uri;

interface UrlBuilderInterface
{
    /**
     * @param string $baseUrl
     * @return $this
     */
    public function setBaseUrl(string $baseUrl): static;

    /**
     * @return string
     */
    public function getBaseUrl(): string;

    /**
     * @param CommandInterface $command
     * @return Uri
     */
    public function build(CommandInterface $command): Uri;
}