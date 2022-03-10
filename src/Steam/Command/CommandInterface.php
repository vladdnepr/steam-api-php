<?php

namespace SquegTech\Steam\Command;

interface CommandInterface
{
    /**
     * @return string
     */
    public function getInterface(): string;

    /**
     * @return string
     */
    public function getMethod(): string;

    /**
     * @return string
     */
    public function getVersion(): string;

    /**
     * @return string
     */
    public function getRequestMethod(): string;

    /**
     * @return array
     */
    public function getParams(): array;
}