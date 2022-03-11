<?php

namespace SquegTech\Steam\Tests\Command\CheatReportingService;

use DateTime;
use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CheatReportingService\ReportCheatData;
use SquegTech\Steam\Command\CommandInterface;

class ReportCheatDataTest extends TestCase
{
    /**
     * @var ReportCheatData
     */
    private ReportCheatData $instance;

    /**
     * @var \DateTime
     */
    private $dateTime;

    public function setUp(): void
    {
        $this->dateTime = new DateTime();

        $this->instance = new ReportCheatData(
            123456789,
            321658,
            'pathAndFileName',
            'webCheatUrl',
            $this->dateTime,
            $this->dateTime,
            $this->dateTime,
            'cheatName',
            123435,
            456435
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
            'steamid' => 123456789,
            'appid' => 321658,
            'pathandfilename' => 'pathAndFileName',
            'webcheaturl' => 'webCheatUrl',
            'time_now' => $this->dateTime->getTimestamp(),
            'time_started' => $this->dateTime->getTimestamp(),
            'time_stopped' => $this->dateTime->getTimestamp(),
            'cheatname' => 'cheatName',
            'game_process_id' => 123435,
            'cheat_process_id' => 456435
        ], $this->instance->getParams());
    }
}
