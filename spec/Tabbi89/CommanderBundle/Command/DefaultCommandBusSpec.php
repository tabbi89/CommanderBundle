<?php

namespace spec\Tabbi89\CommanderBundle\Command;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Tabbi89\CommanderBundle\Command\CommandTranslatorInterface;
use Tabbi89\CommanderBundle\Command\CommandHandlerInterface;

class DefaultCommandBusSpec extends ObjectBehavior
{
    function let(CommandTranslatorInterface $commandTranslator)
    {
        $this->beConstructedWith($commandTranslator);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Tabbi89\CommanderBundle\Command\DefaultCommandBus');
        $this->shouldImplement('Tabbi89\CommanderBundle\Command\CommandBusInterface');
    }

    function it_adds_new_handler(CommandHandlerInterface $handler)
    {
        $this->addHandler($handler, 'testalias');
    }

    function it_should_not_allow_unregistrated_handlers()
    {
        $this->shouldThrow('Tabbi89\CommanderBundle\Command\HandlerNotRegisteredException')->duringExecute(new AddUserCommand('Thomas'));
    }

    function it_should_execute_command(CommandHandlerInterface $handler, CommandTranslatorInterface $commandTranslator)
    {
        $handler->handle(Argument::any())->shouldBeCalled()->willReturn('user');
        $commandTranslator->toCommandHandler(Argument::any())->shouldBeCalled()->willReturn('AddUserHandler');
        $this->addHandler($handler, 'AddUserHandler');
        $this->execute(new AddUserCommand('Thomas'))->shouldBe('user');
    }
}

class AddUserCommand
{
    public $userName;

    public function __construct($userName)
    {
        $this->userName = $userName;
    }
}
