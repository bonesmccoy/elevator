<?php

namespace Bones\Building;

class Resident
{
    /**
     * @var Floor
     */
    protected $currentFloor;

    protected $targetFloor = null;

    protected function __construct() {}

    /**
     * @param Floor $floor
     * @return Resident
     */
    public static function createOnTheFloor(Floor $floor)
    {
        $resident = new Resident();
        $resident->setCurrentFloor($floor);

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
    public function setCurrentFloor($floor)
    {
        $this->currentFloor = $floor;
    }

    /**
     * @param Floor $floor
     */
    public function moveToFloor(Floor $floor)
    {
        $this->targetFloor = $floor;
    }


}
