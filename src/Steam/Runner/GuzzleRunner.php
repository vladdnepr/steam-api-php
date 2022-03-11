<?php

namespace SquegTech\Steam\Runner;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Utility\UrlBuilderInterface;

class GuzzleRunner extends AbstractRunner implements RunnerInterface
{
    /**
     * @param ClientInterface $client
     * @param UrlBuilderInterface $urlBuilder
     */
    public function __construct(
        private ClientInterface $client,
        private UrlBuilderInterface $urlBuilder
    ) {}

    /**
     * {@inheritdoc}
     *
     * @return ResponseInterface
     */
    public function run(CommandInterface $command, ResponseInterface|null $result = null): ResponseInterface
    {
        $guzzleAsyncRunner = new GuzzleAsyncRunner($this->client, $this->urlBuilder);
        $guzzleAsyncRunner->setConfig($this->config);

        return $guzzleAsyncRunner->run($command)->wait();
    }
}
