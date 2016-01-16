<?php

namespace Bones\Building\Elevator;

use Bones\Building\Floor;
use Bones\Building\Resident;

class Controller
{
    /**
     * @var Elevator
     */
    private $elevator;

    /**
     * @var Resident[]
     */
    private $callerResidentList = array();

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
        $this->addCallerResident($resident);
        $this->elevator->moveToFloor($residentFloor);
    }

    public function pressDownButton(Resident $resident)
    {
        $residentFloor = $resident->getCurrentFloor();
        $this->addCallerResident($resident);
        $this->elevator->moveToFloor($residentFloor);
    }

    public function pressButtonWithNumber($floorNumber, Resident $resident)
    {
        $targetFloor = new Floor($floorNumber);
        $this->elevator->moveToFloor($targetFloor);
        $resident->setCurrentFloor($targetFloor);
    }

    public function moveElevator()
    {
        foreach($this->callerResidentList as $resident)
        {
            $this->elevator->moveToFloor($resident->getCurrentFloor());
            $resident->setCurrentFloor($resident->getTargetFloor());
        }
    }

    private function addCallerResident(Resident $floor)
    {
        $this->callerResidentList[] = $floor;
    }

    private function resetCallerList()
    {
        $this->callerResidentList = array();
    }
}
