<?php

namespace SquegTech\Steam\Command\CheatReportingService;

use DateTime;
use SquegTech\Steam\Command\CommandInterface;

class ReportCheatData implements CommandInterface
{
    /**
     * @param int $steamId
     * @param int $appId
     * @param string $pathAndFileName
     * @param string $webCheatUrl
     * @param DateTime $timeNow
     * @param DateTime $timeStarted
     * @param DateTime $timeStopped
     * @param string $cheatName
     * @param int $gameProcessId
     * @param int $cheatProcessId
     */
    public function __construct(
        private int $steamId,
        private int $appId,
        private string $pathAndFileName,
        private string $webCheatUrl,
        private DateTime $timeNow,
        private DateTime $timeStarted,
        private DateTime $timeStopped,
        private string $cheatName,
        private int $gameProcessId,
        private int $cheatProcessId
    ) {}

    /**
     * @return string
     */
    public function getInterface(): string
    {
        return 'IAccountRecoveryService';
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return 'ReportAccountRecoveryData';
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return 'v1';
    }

    /**
     * @return string
     */
    public function getRequestMethod(): string
    {
        return 'POST';
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return [
            'steamid' => $this->steamId,
            'appid' => $this->appId,
            'pathandfilename' => $this->pathAndFileName,
            'webcheaturl' => $this->webCheatUrl,
            'time_now' => $this->timeNow->getTimestamp(),
            'time_started' => $this->timeStarted->getTimestamp(),
            'time_stopped' => $this->timeStopped->getTimestamp(),
            'cheatname' => $this->cheatName,
            'game_process_id' => $this->gameProcessId,
            'cheat_process_id' => $this->cheatProcessId,
        ];
    }
}
