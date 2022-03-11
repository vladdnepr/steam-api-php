<?php

namespace SquegTech\Steam\Tests\Runner;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\Uri;
use Mockery as M;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Configuration;
use SquegTech\Steam\Runner\GuzzleRunner;
use SquegTech\Steam\Utility\UrlBuilderInterface;

class GuzzleRunnerTest extends TestCase
{
    /**
     * @var GuzzleRunner
     */
    private GuzzleRunner $instance;

    /**
     * @var M\MockInterface
     */
    private M\MockInterface $clientMock;

    /**
     * @var M\MockInterface
     */
    private M\MockInterface $urlBuilderMock;

    /**
     * @var M\MockInterface
     */
    private M\MockInterface $configMock;

    public function setUp(): void
    {
        $this->clientMock = M::mock(ClientInterface::class);
        $this->urlBuilderMock = M::mock(UrlBuilderInterface::class);

        $this->instance = new GuzzleRunner($this->clientMock, $this->urlBuilderMock);

        $this->configMock = M::mock(Configuration::class, [
            'getBaseSteamApiUrl' => 'http://base.url.com',
        ]);

        $this->instance->setConfig($this->configMock);
    }

    public function testCallingRun()
    {
        $params = ['query' => ['a' => 'bc']];
        $url = 'http://base.url.com/built';

        $commandMock = M::mock(CommandInterface::class, [
            'getParams' => $params['query'],
            'getRequestMethod' => 'GET',
        ]);

        $this->configMock->shouldReceive('getSteamKey')->andReturn('');

        $this->urlBuilderMock->shouldReceive('setBaseUrl')->with('http://base.url.com');
        $this->urlBuilderMock->shouldReceive('build')->andReturn(new Uri($url));

        $response = M::mock(ResponseInterface::class);

        $promise = M::mock(PromiseInterface::class);
        $promise->shouldReceive('wait')->andReturn($response);

        $this->clientMock->shouldReceive('sendAsync')
            ->with(M::type('Psr\Http\Message\RequestInterface'), $params)
            ->andReturn($promise)->once();

        $this->assertEquals($response, $this->instance->run($commandMock));
    }

    public function testCallingRunThatWillIncludeSteamKey()
    {
        $commandParams = ['a' => 'bc'];
        $url = 'http://base.url.com/built';
        $steamKey = 'test_steam_key';

        $options = ['query' => array_merge($commandParams, [
            'key' => $steamKey,
        ])];

        $commandMock = M::mock(CommandInterface::class, [
                'getParams' => $commandParams,
                'getRequestMethod' => 'GET',
            ]);

        $this->configMock->shouldReceive('getSteamKey')->andReturn($steamKey);

        $this->urlBuilderMock->shouldReceive('setBaseUrl')->with('http://base.url.com');
        $this->urlBuilderMock->shouldReceive('build')->andReturn(new Uri($url));

        $response = M::mock(ResponseInterface::class);

        $promise = M::mock(PromiseInterface::class);
        $promise->shouldReceive('wait')->andReturn($response);

        $this->clientMock->shouldReceive('sendAsync')->with(M::type('Psr\Http\Message\RequestInterface'), $options)->andReturn($promise)->once();

        $this->assertEquals($response, $this->instance->run($commandMock));
    }
}
