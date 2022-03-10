<?php

namespace SquegTech\Steam;

use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Runner\RunnerInterface;

class Steam
{
    public const BASE_URL = 'https://api.steampowered.com';

    /**
     * @var array
     */
    private array $runners = [];

    /**
     * @param Configuration $config
     */
    public function __construct(
        private Configuration $config
    ) {}

    /**
     * @return Configuration
     */
    public function getConfig(): Configuration
    {
        return $this->config;
    }

    /**
     * @param Configuration $config
     * @return static
     */
    public function setConfig(Configuration $config): static
    {
        $this->config = $config;
        return $this;
    }

    /**
     * @param array $runners
     * @return static
     */
    public function addRunners(array $runners): static
    {
        foreach($runners as $runner) {
            $this->addRunner($runner);
        }

        return $this;
    }

    /**
     * @param RunnerInterface $runner
     * @return static
     */
    public function addRunner(RunnerInterface $runner): static
    {
        $this->runners[] = $runner->setConfig($this->config);
        return $this;
    }

    /**
     * @param CommandInterface $command
     * @return mixed
     */
    public function run(CommandInterface $command): mixed
    {
        $result = null;

        /** @var RunnerInterface $runner */
        foreach($this->runners as $runner) {
            $result = $runner->run($command, $result);
        }

        return $result;
    }
}