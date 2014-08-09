<?php

namespace Tabbi89\CommanderBundle\Command;

/**
 * Interface CommandBusInterface
 *
 * @package Tabbi89\CommanderBundle
 */
interface CommandBusInterface
{
    /**
     * Execute a command
     *
     * @param mixed $command
     *
     * @return mixed
     */
    public function execute($command);
}
