<?php

namespace spec\Bones\Building\Elevator;

use Bones\Building\Floor;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ElevatorSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedThrough('createAtFloor', array(new Floor(5)));
    }
    public function it_should_be_constructed_through_create_at_floor()
    {
        $this->beConstructedThrough('createAtFloor', array(new Floor(5)));
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Bones\Building\Elevator\Elevator');
    }

    public function it_should_get_current_floor()
    {
        $this->getCurrentFloor()->shouldBeLike(new Floor(5));
    }

    public function it_should_is_on_the_floor()
    {
        $floor = new Floor(5);
        $this->isOnTheFloor($floor)->shouldBeLike(true);

        $floor = new Floor(0);
        $this->isOnTheFloor($floor)->shouldBeLike(false);
    }
}
