<?php

namespace spec\Tabbi89\CommanderBundle\Event;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class EventDispatcherSpec extends ObjectBehavior
{
    function let(EventDispatcherInterface $event, LoggerInterface $log)
    {
        $this->beConstructedWith($event, $log);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Tabbi89\CommanderBundle\Event\EventDispatcher');
    }
}
