<?php

namespace Tabbi89\CommanderBundle\Command;

/**
 * Interface CommandTranslatorInterface
 *
 * @package Tabbi89\CommanderBundle
 */
interface CommandTranslatorInterface
{
    /**
     * Translate a command to its handler counterpart
     *
     * @param mixed $command
     *
     * @return mixed
     *
     * @throws Exception
     */
    public function toCommandHandler($command);
}
