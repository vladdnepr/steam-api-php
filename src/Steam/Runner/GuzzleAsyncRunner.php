<?php

namespace SquegTech\Steam\Runner;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\ResponseInterface;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Utility\UrlBuilderInterface;

class GuzzleAsyncRunner extends AbstractRunner implements RunnerInterface
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
     * @return PromiseInterface
     */
    public function run(CommandInterface $command, ResponseInterface|null $result = null): PromiseInterface
    {
        $key = $command->getRequestMethod() === 'GET' ? 'query' : 'body';
        $options = [
            $key => []
        ];

        if(!empty($params = $command->getParams())) {
            $options[$key] = array_merge($options[$key], $params);
        }

        if($config = $this->getConfig()) {
            if(!empty($config->getSteamKey())) {
                $options[$key]['key'] = $config->getSteamKey();
            }

            $this->urlBuilder->setBaseUrl($config->getBaseSteamApiUrl());
        }

        $request = new Request(
            $command->getRequestMethod(),
            $this->urlBuilder->build($command)
        );

        return $this->client->sendAsync($request, $options);
    }
}