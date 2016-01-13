<?php

namespace Bones\Building\Elevator;

use Bones\Building\Resident;

class Controller
{
    /**
     * @var Elevator
     */
    private $elevator;

    /**
     * Controller constructor.
     * @param Elevator $elevator
     */
    public function __construct(Elevator $elevator)
    {
        $this->elevator = $elevator;
    }

    /**
     * @return Elevator
     */
    public function getElevator()
    {
        return $this->elevator;
    }

    public function pressUpButton(Resident $resident)
    {
        $residentFloor = $resident->getCurrentFloor();
        $this->elevator->goToFloor($residentFloor);
    }
}
