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
}
