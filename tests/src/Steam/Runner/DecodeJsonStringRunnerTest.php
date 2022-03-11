<?php

namespace SquegTech\Steam\Tests\Runner;

use InvalidArgumentException;
use Mockery as M;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Runner\DecodeJsonStringRunner;

class DecodeJsonStringRunnerTest extends TestCase
{
    /**
     * @var DecodeJsonStringRunner
     */
    private DecodeJsonStringRunner $instance;

    public function setUp(): void
    {
        $this->instance = new DecodeJsonStringRunner();
    }

    public function testResultMustBeInstanceOfResponseInterface()
    {
        $this->expectException(InvalidArgumentException::class);

        $this->instance->run(M::mock(CommandInterface::class));
    }

    public function testJsonIsCalledOnResponseObject()
    {
        $resultString = '{"a":"bc"}';
        $resultArray = ['a' => 'bc'];

        $stream = M::mock(StreamInterface::class);
        $stream->shouldReceive('getContents')->andReturn($resultString)->once();

        $response = M::mock(ResponseInterface::class);
        $response->shouldReceive('getBody')->andReturn($stream)->once();

        $this->assertEquals($resultArray, $this->instance->run(M::mock(CommandInterface::class), $response));

    }
}
