<?php

namespace SquegTech\Steam\Utility;

use GuzzleHttp\Psr7\Uri;
use SquegTech\Steam\Command\CommandInterface;

class GuzzleUrlBuilder implements UrlBuilderInterface
{
    /**
     * @var string
     */
    private string $baseUrl = '';

    /**
     * {@inheritdoc}
     */
    public function setBaseUrl(string $baseUrl): static
    {
        $this->baseUrl = $baseUrl;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * {@inheritdoc}
     */
    public function build(CommandInterface $command): Uri
    {
        $uri = sprintf('%s/%s/%s/%s',
            rtrim($this->getBaseUrl()),
            $command->getInterface(),
            $command->getMethod(),
            $command->getVersion()
        );

        return new Uri($uri);
    }
}