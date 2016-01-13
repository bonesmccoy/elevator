<?php

namespace spec\Bones\Building;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ResidentSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Bones\Building\Resident');
    }

    public function it_should_be_constructed_through_create_on_the_floor()
    {
        $this->beConstructedThrough('createOnTheFloor');
    }
}
