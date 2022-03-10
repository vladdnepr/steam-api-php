<?php

namespace SquegTech\Steam\Tests;

use Mockery as M;
use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Runner\RunnerInterface;
use SquegTech\Steam\Steam;
use SquegTech\Steam\Configuration;

class SteamTest extends TestCase
{
    /**
     * @var Steam
     */
    private Steam $instance;

    /**
     * @var Configuration
     */
    private Configuration $config;

    public function setUp(): void
    {
        $this->config = new Configuration();
        $this->instance = new Steam($this->config);
    }

    public function testAddingOneRunner()
    {
        $commandMock = M::mock(CommandInterface::class);

        $result = 'called';

        $runnerMock = M::mock(RunnerInterface::class);
        $runnerMock->shouldReceive('setConfig')->with($this->config)->andReturnSelf()->once();
        $runnerMock->shouldReceive('run')->with($commandMock, null)->andReturn($result)->once();

        $this->instance->addRunner($runnerMock);

        $this->assertEquals($result, $this->instance->run($commandMock));
    }

    public function testAddingOneRunnerFromArray()
    {
        $commandMock = M::mock(CommandInterface::class);

        $result = 'called';

        $runnerMock = M::mock(RunnerInterface::class);
        $runnerMock->shouldReceive('setConfig')->with($this->config)->andReturnSelf()->once();
        $runnerMock->shouldReceive('run')->with($commandMock, null)->andReturn($result)->once();

        $this->instance->addRunners([$runnerMock]);

        $this->assertEquals($result, $this->instance->run($commandMock));
    }

    public function testAddingTwoRunners()
    {
        $commandMock = M::mock(CommandInterface::class);

        $resultOne = 'called';
        $resultTwo = 'called second';

        $runnerMockOne = M::mock(RunnerInterface::class);
        $runnerMockOne->shouldReceive('setConfig')->with($this->config)->andReturnSelf()->once();
        $runnerMockOne->shouldReceive('run')->with($commandMock, null)->andReturn($resultOne)->once();

        $runnerMockTwo = M::mock(RunnerInterface::class);
        $runnerMockTwo->shouldReceive('setConfig')->with($this->config)->andReturnSelf()->once();
        $runnerMockTwo->shouldReceive('run')->with($commandMock, $resultOne)->andReturn($resultTwo)->once();

        $this->instance->addRunner($runnerMockOne);
        $this->instance->addRunner($runnerMockTwo);

        $this->assertEquals($resultTwo, $this->instance->run($commandMock));
    }

    public function testAddingTwoRunnersFromArray()
    {
        $commandMock = M::mock(CommandInterface::class);

        $resultOne = 'called';
        $resultTwo = 'called second';

        $runnerMockOne = M::mock(RunnerInterface::class);
        $runnerMockOne->shouldReceive('setConfig')->with($this->config)->andReturnSelf()->once();
        $runnerMockOne->shouldReceive('run')->with($commandMock, null)->andReturn($resultOne)->once();

        $runnerMockTwo = M::mock(RunnerInterface::class);
        $runnerMockTwo->shouldReceive('setConfig')->with($this->config)->andReturnSelf()->once();
        $runnerMockTwo->shouldReceive('run')->with($commandMock, $resultOne)->andReturn($resultTwo)->once();

        $this->instance->addRunners([$runnerMockOne, $runnerMockTwo]);

        $this->assertEquals($resultTwo, $this->instance->run($commandMock));
    }

    public function testGettingAndSettingConfig()
    {
        $config = new Configuration();

        $this->assertEquals($this->instance, $this->instance->setConfig($config));
        $this->assertEquals($config, $this->instance->getConfig());
    }
}
