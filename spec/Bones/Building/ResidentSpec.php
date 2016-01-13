<?php

namespace spec\Bones\Building;

use Bones\Building\Floor;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ResidentSpec extends ObjectBehavior
{

    public function let()
    {
        $this->beConstructedThrough('createOnTheFloor', array(new Floor(0)));
    }

    public function it_should_be_constructed_through_create_on_the_floor()
    {
        $this->beConstructedThrough('createOnTheFloor', array(new Floor(0)));
        $this->shouldHaveType('Bones\Building\Resident');
    }

    public function it_should_call_elevator()
    {
        $this->callElevator();
    }
}
