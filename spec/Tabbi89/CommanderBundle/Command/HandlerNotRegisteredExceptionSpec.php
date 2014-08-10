<?php

namespace spec\Tabbi89\CommanderBundle\Command;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class HandlerNotRegisteredExceptionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Tabbi89\CommanderBundle\Command\HandlerNotRegisteredException');
        $this->shouldReturnAnInstanceOf('\RuntimeException');
    }
}
