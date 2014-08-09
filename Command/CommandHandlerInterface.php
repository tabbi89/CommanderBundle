<?php

namespace Tabbi89\CommanderBundle\Command;

/**
 * Interface CommandHandlerInterface
 *
 * @package Tabbi89\CommanderBundle
 */
interface CommandHandlerInterface
{
    /**
     * Handle the command
     *
     * @param mixed $command
     *
     * @return mixed
     */
    public function handle($command);
}
