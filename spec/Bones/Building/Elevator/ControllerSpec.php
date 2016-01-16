<?php

namespace spec\Bones\Building\Elevator;

use Bones\Building\Elevator\Elevator;
use Bones\Building\Floor;
use Bones\Building\Resident;
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

    public function it_should_contain_an_elevator()
    {
        $this->getElevator()->shouldReturnAnInstanceOf('Bones\Building\Elevator\Elevator');
    }

    public function it_should_reach_the_resident_floor_when_button_up_is_pressed($elevator)
    {
        $elevator->beADoubleOf('Bones\Building\Elevator\Elevator');
        $resident = Resident::createOnTheFloor(new Floor(0));

        $this->beConstructedWith($elevator);
        $this->pressUpButton($resident);

        $elevator->moveToFloor($resident->getCurrentFloor())->shouldHaveBeenCalled();
    }

    public function it_should_reach_the_resident_floor_when_button_down_is_pressed($elevator)
    {
        $elevator->beADoubleOf('Bones\Building\Elevator\Elevator');
        $resident = Resident::createOnTheFloor(new Floor(0));

        $this->beConstructedWith($elevator);
        $this->pressDownButton($resident);

        $elevator->moveToFloor($resident->getCurrentFloor())->shouldHaveBeenCalled();
    }


    public function it_should_press_button_with_number($elevator, $resident)
    {
        //$resident = Resident::createOnTheFloor(new Floor(0));
        $elevator->beADoubleOf('Bones\Building\Elevator\Elevator');
        $resident->beADoubleOf('Bones\Building\Resident');
        $this->beConstructedWith($elevator);

        $floorNumber = 6;
        $this->pressButtonWithNumber($floorNumber, $resident);

        $elevator->moveToFloor(new Floor($floorNumber))->shouldHaveBeenCalled();
        $resident->moveToFloor(new Floor($floorNumber))->shouldHaveBeenCalled();

    }
}
