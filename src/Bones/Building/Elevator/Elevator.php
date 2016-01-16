<?php

namespace Bones\Building\Elevator;

use Bones\Building\Floor;

class Elevator
{
    const UP_BUTTON = 'UP';
    const DOWN_BUTTON = 'DOWN';

    protected $currentFloor;

    private function __construct(Floor $floor)
    {
        $this->currentFloor = $floor;
    }

    public function getCurrentFloor()
    {
        return $this->currentFloor;
    }

    public function isOnTheFloor(Floor $floor)
    {
        return $this->currentFloor->isEqual($floor);
    }

    public static function createAtFloor(Floor $floor)
    {
        return new Elevator($floor);
    }

    public function moveToFloor(Floor $floor)
    {
        if ($this->currentFloor->isEqual($floor)) return;

        if ($this->currentFloor->isAbove($floor)) {
            $this->decreaseTheFloorUntil($floor->getFloorNumber());
        } else {
            $this->increaseTheFloorUntil($floor->getFloorNumber());
        }
    }

    private function decreaseTheFloorUntil($floorNumber)
    {
        $currentFloorNumber = $this->currentFloor->getFloorNumber();
        while($currentFloorNumber > $floorNumber) {
            $currentFloorNumber--;
        }

        $this->currentFloor = new Floor($currentFloorNumber);
    }

    public function increaseTheFloorUntil($floorNumber)
    {
        $currentFloorNumber = $this->currentFloor->getFloorNumber();
        while($currentFloorNumber < $floorNumber) {
            $currentFloorNumber++;
        }

        $this->currentFloor = new Floor($currentFloorNumber);
    }

}
