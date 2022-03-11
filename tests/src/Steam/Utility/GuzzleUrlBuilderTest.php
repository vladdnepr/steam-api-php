<?php

namespace SquegTech\Steam\Tests\Utility;

use Mockery as M;
use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Utility\GuzzleUrlBuilder;

class GuzzleUrlBuilderTest extends TestCase
{
    /**
     * @var GuzzleUrlBuilder
     */
    private GuzzleUrlBuilder $instance;

    public function setUp(): void
    {
        $this->instance = new GuzzleUrlBuilder();
    }

    public function testUrlIsReturnedAndInTheCorrectFormat()
    {
        $baseUrl = 'http://base.url.com';

        $commandMock = M::mock(CommandInterface::class, [
                'getInterface' => 'testInterface',
                'getMethod' => 'testMethod',
                'getVersion' => 'testVersion',
            ]);

        $uri = $this->instance->setBaseUrl($baseUrl)->build($commandMock);

        $this->assertInstanceOf('GuzzleHttp\Psr7\Uri', $uri);

        $this->assertEquals('base.url.com', $uri->getHost());
        $this->assertEquals('http', $uri->getScheme());
        $this->assertEquals('/testInterface/testMethod/testVersion', $uri->getPath());
    }
}
