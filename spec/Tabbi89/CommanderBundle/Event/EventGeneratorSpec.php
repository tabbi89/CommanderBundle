<?php

namespace spec\Tabbi89\CommanderBundle\Event;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Tabbi89\CommanderBundle\Event\EventGenerator as BaseEventGenerator;

class EventGeneratorSpec extends ObjectBehavior
{
    function let()
    {
        $this->beAnInstanceOf('spec\Tabbi89\CommanderBundle\Event\User');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('spec\Tabbi89\CommanderBundle\Event\User');
    }

    function it_raises_event()
    {
        $this->add();
    }

    function it_releases_events()
    {
        $this->releaseEvents()->shouldBeArray();
        $this->add();
        $this->releaseEvents()->shouldBe(['new_user_created']);
    }
}

class User
{
    use BaseEventGenerator;

    public function add()
    {
        $this->raise('new_user_created');

        return new User();
    }
}
