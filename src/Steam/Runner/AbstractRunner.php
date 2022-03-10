<?php

namespace SquegTech\Steam\Runner;

use SquegTech\Steam\Configuration;

abstract class AbstractRunner
{
    /**
     * @var Configuration
     */
    private Configuration $config;

    /**
     * @param Configuration $config
     * @return $this
     */
    public function setConfig(Configuration $config): static
    {
        $this->config = $config;
        return $this;
    }

    /**
     * @return Configuration
     */
    public function getConfig(): Configuration
    {
        return $this->config;
    }
}