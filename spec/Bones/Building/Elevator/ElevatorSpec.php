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
    public function it_should_be_created_on_a_floor()
    {
        $this->beConstructedThrough('createAtFloor', array(new Floor(5)));
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Bones\Building\Elevator\Elevator');
    }

    public function it_should_be_on_a_floor()
    {
        $this->getCurrentFloor()->shouldBeLike(new Floor(5));
    }

    public function it_should_declare_his_floor()
    {
        $floor = new Floor(5);
        $this->isOnTheFloor($floor)->shouldBeLike(true);

        $floor = new Floor(0);
        $this->isOnTheFloor($floor)->shouldBeLike(false);
    }

    public function it_should_move_to_a_different_floor()
    {
        $this->beConstructedThrough('createAtFloor', array(new Floor(10)));
        $this->moveToFloor(new Floor(5));
        $this->isOnTheFloor(new Floor(5))->shouldBeLike(true);
    }
}
