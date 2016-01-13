<?php

namespace spec\Bones\Building;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FloorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith(array(0));
        $this->shouldHaveType('Bones\Building\Floor');
    }
}
