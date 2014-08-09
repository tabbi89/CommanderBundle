<?php

namespace Tabbi89\CommanderBundle\Command;

/**
 * Class DefaultCommandBus
 *
 * @package Tabbi89\CommanderBundle
 */
class DefaultCommandBus implements CommandBusInterface
{
    /**
     * @var object|CommandTranslator
     */
    protected $commandTranslator;

    /**
     * List of all registrated handlers
     *
     * @var array
     */
    protected $handlers;

    /**
     * @param CommandTranslator $commandTranslator
     */
    public function __construct(CommandTranslatorInterface $commandTranslator)
    {
        $this->commandTranslator = $commandTranslator;
        $this->handlers          = [];
    }

    /**
     * Add handlers
     *
     * @param CommandHandlerInterface $handler
     * @param string                  $alias
     */
    public function addHandler(CommandHandlerInterface $handler, $alias)
    {
        $this->handlers[$alias] = $handler;
    }

    /**
     * Execute the command
     *
     * @param mixed $command
     *
     * @return mixed
     */
    public function execute($command)
    {
        $handler = $this->commandTranslator->toCommandHandler($command);

        if (!array_key_exists($handler, $this->handlers)) {
            throw new HandlerNotRegisteredException("Handler [$handler] not registrated");
        }

        return $this->handlers[$handler]->handle($command);
    }
}
