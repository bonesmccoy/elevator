<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Bones\Building\Elevator\Controller as ElevatorController;
use Bones\Building\Elevator\Elevator;
use Bones\Building\Resident;
use Bones\Building\Floor;

/**
 * Defines application features from the specific context.
 */
class ResidentContext implements Context, SnippetAcceptingContext
{
    /**
     * @var Resident
     */
    protected $resident;

    /**
     * @var Floor
     */
    protected $targetFloor;

    /**
     * @var ElevatorController
     */
    protected $elevatorController;


    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $elevator = Elevator::createAtFloor(new Floor(5));
        $this->elevatorController = new ElevatorController($elevator);

    }


    /**
     * @Given I am on the ground floor
     */
    public function iAmOnTheGroundFloor()
    {
        $groundFloor = new Floor(0);
        $this->resident = Resident::createOnTheFloor($groundFloor);

    }

    /**
     * @Given the elevator is not on my floor
     */
    public function theElevatorIsNotOnMyFloor()
    {
        $residentCurrentFloor = $this->resident->getCurrentFloor();
        if ($this->elevatorController->getElevator()->isOnTheFloor($residentCurrentFloor)) {
            throw new \Exception("The Elevator is on My Floor, should be in Another");
        }
    }

    /**
     * @When I call the elevator with the up button
     */
    public function iCallTheElevatorWithTheUpButton()
    {
       $this->elevatorController->pressUpButton($this->resident);
    }

    /**
     * @Then the elevator reach the ground floor
     */
    public function theElevatorReachTheGroundFloor()
    {
        if (!$this->elevatorController->getElevator()->isOnTheFloor($this->resident->getCurrentFloor())) {
            throw new \Exception("The Elevator is not on my floor");
        }
    }

    /**
     * @Given The elevator is on my floor
     */
    public function theElevatorIsOnMyFloor()
    {
        $groundFloor = new Floor(0);
        $this->resident = Resident::createOnTheFloor($groundFloor);
        $residentCurrentFloor = $this->resident->getCurrentFloor();

        if ($this->elevatorController->getElevator()->isOnTheFloor($residentCurrentFloor)) {
            throw new \Exception("The Elevator should be in my floor");
        }
    }

    /**
     * @When I press the floor :floorNumber button
     */
    public function iPressTheFloorButton($floorNumber)
    {
        $this->elevatorController->pressButtonWithNumber($floorNumber, $this->resident);
    }

    /**
     * @Then the elevator reach the floor number :floorNumber
     */
    public function theElevatorReachTheFloorNumber($floorNumber)
    {
        $targetFloor = new Floor($floorNumber);
        $elevatorFloor = $this->elevatorController->getElevator()->getCurrentFloor();
        if (!$this->elevatorController->getElevator()->getCurrentFloor()->isEqual($targetFloor)) {
            throw new \Exception(
                sprintf("The Elevator should be in the floor number %s, found in floor %s",
                    $floorNumber,
                    $elevatorFloor->getFloorNumber()
                ));
        }
    }

    /**
     * @Then I am in the floor number :floorNumber
     */
    public function iAmInTheFloorNumber($floorNumber)
    {
        $targetFloor = new Floor($floorNumber);
        if (!$this->resident->getCurrentFloor()->isEqual($targetFloor)) {
            throw new \Exception("The I should be in the floor number $floorNumber");
        }
    }


}
