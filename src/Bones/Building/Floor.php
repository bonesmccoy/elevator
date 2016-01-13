<?php

namespace Bones\Building;

class Floor
{
    private $floorNumber;

    public function __construct($floorNumber)
    {
        $this->floorNumber = $floorNumber;
    }

    /**
     * @return mixed
     */
    public function getFloorNumber()
    {
        return $this->floorNumber;
    }

    public function isEqual(Floor $floor)
    {
        return ($this->floorNumber == $floor->getFloorNumber());
    }
}
