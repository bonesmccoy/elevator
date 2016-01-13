<?php

namespace spec\Bones\Building;

use Bones\Building\Floor;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ElevatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Bones\Building\Elevator');
    }

    public function it_should_get_current_floor()
    {
        $this->getCurrentFloor();
    }

    public function it_should_is_on_the_floor()
    {
        $floor = new Floor(0);
        $this->isOnTheFloor($floor)->shouldBeLike(true);

        $floor = new Floor(5);
        $this->isOnTheFloor($floor)->shouldBeLike(false);
    }
}
