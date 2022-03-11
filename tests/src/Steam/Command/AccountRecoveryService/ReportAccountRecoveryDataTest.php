<?php

namespace SquegTech\Steam\Tests\Command\AccountRecoveryService;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\AccountRecoveryService\ReportAccountRecoveryData;
use SquegTech\Steam\Command\CommandInterface;

class ReportAccountRecoveryDataTest extends TestCase
{
    /**
     * @var ReportAccountRecoveryData
     */
    private ReportAccountRecoveryData $instance;

    public function setUp(): void
    {
        $this->instance = new ReportAccountRecoveryData(
            'loginUserList',
            'installConfig',
            'shaSentryFile',
            'machineId'
        );
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('IAccountRecoveryService', $this->instance->getInterface());
        $this->assertEquals('ReportAccountRecoveryData', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('POST', $this->instance->getRequestMethod());
        $this->assertEquals([
            'loginuser_list' =>  'loginUserList',
            'install_config' => 'installConfig',
            'shasentryfile' => 'shaSentryFile',
            'machineid' => 'machineId',
        ], $this->instance->getParams());
    }
}
