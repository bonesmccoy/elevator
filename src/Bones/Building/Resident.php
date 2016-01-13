<?php

namespace Bones\Building;

class Resident
{
    /**
     * @var Floor
     */
    protected $floor;

    private function __construct()
    {

    }

    public static function createOnTheFloor(Floor $floor)
    {
        $resident = new Resident();
        $resident->setFloor($floor);
    }

    /**
     * @return Floor
     */
    public function getFloor()
    {
        return $this->floor;
    }

    /**
     * @param Floor $floor
     */
    private function setFloor($floor)
    {
        $this->floor = $floor;
    }
}
