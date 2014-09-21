<?php

namespace spec\Tabbi89\CommanderBundle\Command;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BasicCommandTranslatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Tabbi89\CommanderBundle\Command\BasicCommandTranslator');
        $this->shouldImplement('Tabbi89\CommanderBundle\Command\CommandTranslatorInterface');
    }

    function it_should_translate_simple_command_to_simple_hander()
    {
        $this->toCommandHandler(new SimpleCommand())->shouldBe('SimpleHandler');
    }
}

class SimpleCommand
{
}
