<?php

namespace Bones\Building;

class Elevator
{
    protected $currentFloor;

    public function __construct()
    {
        $this->currentFloor = new Floor(0);
    }

    public function getCurrentFloor()
    {
        return $this->currentFloor;
    }

    public function isOnTheFloor(Floor $floor)
    {
        return $this->currentFloor->isEqual($floor);
    }
}
