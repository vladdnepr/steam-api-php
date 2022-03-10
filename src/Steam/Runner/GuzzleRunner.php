<?php

namespace SquegTech\Steam\Runner;

use Psr\Http\Message\ResponseInterface;
use SquegTech\Steam\Command\CommandInterface;

class GuzzleRunner extends GuzzleAsyncRunner
{
    /**
     * {@inheritdoc}
     *
     * @return ResponseInterface
     */
    public function run(CommandInterface $command, $result = null): ResponseInterface
    {
        return parent::run($command, $result)->wait();
    }
}
