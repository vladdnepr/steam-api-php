<?php

namespace SquegTech\Steam\Tests\Command\AccountRecoveryService;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\AccountRecoveryService\RetrieveAccountRecoveryData;
use SquegTech\Steam\Command\CommandInterface;

class RetrieveAccountRecoveryDataTest extends TestCase
{
    /**
     * @var RetrieveAccountRecoveryData
     */
    private RetrieveAccountRecoveryData $instance;

    public function setUp(): void
    {
        $this->instance = new RetrieveAccountRecoveryData(
            'requestHandle'
        );
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('IAccountRecoveryService', $this->instance->getInterface());
        $this->assertEquals('RetrieveAccountRecoveryData', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('POST', $this->instance->getRequestMethod());
        $this->assertEquals([
            'requesthandle' =>  'requestHandle',
        ], $this->instance->getParams());
    }
}
