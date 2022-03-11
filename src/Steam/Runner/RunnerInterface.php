<?php

namespace SquegTech\Steam\Runner;

use Psr\Http\Message\ResponseInterface;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Configuration;

interface RunnerInterface
{
    /**
     * @param Configuration $config
     * @return $this
     */
    public function setConfig(Configuration $config): static;

    /**
     * @return Configuration
     */
    public function getConfig(): Configuration;

    /**
     * Run the command with the result of the previous runner.
     *
     * Obviously if this is the first runner then the result would be null. Maybe the result
     * should be some sort of interface as well?
     *
     * @param CommandInterface $command
     * @param ResponseInterface|null $result
     *
     * @return mixed
     */
    public function run(CommandInterface $command, ResponseInterface|null $result = null): mixed;
}