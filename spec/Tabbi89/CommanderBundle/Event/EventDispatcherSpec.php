<?php

namespace spec\Tabbi89\CommanderBundle\Event;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

use Symfony\Component\EventDispatcher\Event as CustomEvent;

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

    function it_dispatches_events(CustomEvent $customEvent, EventDispatcherInterface $event, LoggerInterface $log)
    {
        $event->dispatch(Argument::type('string'), Argument::any())->shouldBeCalled();
        $log->info(Argument::any())->shouldBeCalled();

        $events = [];
        array_push($events, $customEvent);

        $this->dispatch($events);
    }
}
