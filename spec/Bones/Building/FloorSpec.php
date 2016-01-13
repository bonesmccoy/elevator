<?php

namespace spec\Bones\Building;

use Bones\Building\Floor;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FloorSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(0);
    }

    function it_is_initializable()
    {
        $this->beConstructedWith(5);
        $this->shouldHaveType('Bones\Building\Floor');
    }

    function it_should_be_comparable()
    {
        $groundFloor = new Floor(0);
        $this->isEqual($groundFloor)->shouldBeLike(true);

        $anotherFloor = new Floor(4);
        $this->isEqual($anotherFloor)->shouldBeLike(false);
    }

    function it_should_be_above_another_floor()
    {
        $this->beConstructedWith(5);

        $this->isAbove(new Floor(4))->shouldBeLike(true);
        $this->isAbove(new Floor(6))->shouldBeLike(false);
        $this->isAbove(new Floor(5))->shouldBeLike(false);

    }

    function it_should_be_below_another_floor()
    {
        $this->beConstructedWith(5);
        
        $this->isBelow(new Floor(4))->shouldBeLike(false);
        $this->isBelow(new Floor(6))->shouldBeLike(true);
        $this->isBelow(new Floor(5))->shouldBeLike(false);
    }
}
