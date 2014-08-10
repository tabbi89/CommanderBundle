<?php

namespace spec\Tabbi89\CommanderBundle\Command;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Tabbi89\CommanderBundle\Command\CommandTranslatorInterface;

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
}
