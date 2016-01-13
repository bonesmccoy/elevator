<?php

namespace Bones\Building;

class Resident
{
    /**
     * @var Floor
     */
    protected $currentFloor;

    protected function __construct() {}

    /**
     * @param Floor $floor
     * @return Resident
     */
    public static function createOnTheFloor(Floor $floor)
    {
        $resident = new Resident();
        $resident->setFloor($floor);

        return $resident;
    }

    /**
     * @return Floor
     */
    public function getCurrentFloor()
    {
        return $this->currentFloor;
    }


    /**
     * @param Floor $floor
     */
    private function setFloor($floor)
    {
        $this->currentFloor = $floor;
    }

    public function callElevator()
    {
        // TODO: write logic here
    }


}
