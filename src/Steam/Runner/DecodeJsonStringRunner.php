<?php

namespace SquegTech\Steam\Runner;

use Psr\Http\Message\ResponseInterface;
use SquegTech\Steam\Command\CommandInterface;
use InvalidArgumentException;

class DecodeJsonStringRunner extends AbstractRunner implements RunnerInterface
{
    /**
     * @param CommandInterface $command
     * @param ResponseInterface|null $result
     * @return array|bool
     */
    public function run(CommandInterface $command, ResponseInterface $result = null): array|bool
    {
        if($result === null) {
            throw new InvalidArgumentException(
                'The result needs to be an instance of Psr\Http\Message\ResponseInterface'
            );
        }

        return json_decode($result->getBody()->getContents(), true);
    }
}