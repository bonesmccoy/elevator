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

    public function it_should_be_created_in_a_floor()
    {
        $this->beConstructedThrough('createOnTheFloor', array(new Floor(0)));
        $this->shouldHaveType('Bones\Building\Resident');
    }

    public function it_can_move_to_a_floor()
    {
        $this->moveToFloor(new Floor(10));
    }
}
