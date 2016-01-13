<?php

namespace spec\Bones\Building\Elevator;

use Bones\Building\Elevator\Elevator;
use Bones\Building\Floor;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ControllerSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(Elevator::createAtFloor(new Floor(0)));
    }

    function it_is_initializable()
    {
        $this->beConstructedWith(Elevator::createAtFloor(new Floor(5)));
        $this->shouldHaveType('Bones\Building\Elevator\Controller');
    }

    public function it_should_get_elevator()
    {
        $this->getElevator()->shouldReturnAnInstanceOf('Bones\Building\Elevator\Elevator');
    }

    public function it_should_press_up_button()
    {
         $this->pressUpButton();
    }
}