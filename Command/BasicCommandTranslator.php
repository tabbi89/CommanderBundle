<?php

namespace Tabbi89\CommanderBundle\Command;

/**
 * Class BasicCommandTranslator
 *
 * @package Tabbi89\CommanderBundle
 */
class BasicCommandTranslator implements CommandTranslatorInterface
{
    /**
     * Translate a command to its handler counterpart
     *
     * @param mixed $command
     *
     * @return mixed
     *
     * @throws HandlerNotRegisteredException
     */
    public function toCommandHandler($command)
    {
        $commandClass = join('', array_slice(explode('\\', get_class($command)), -1));
        $handler      = str_replace('Command', 'Handler', $commandClass);

        return $handler;
    }
}
