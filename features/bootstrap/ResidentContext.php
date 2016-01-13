<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
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
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {

    }


    /**
     * @Given I am on the ground floor
     */
    public function iAmOnTheGroundFloor()
    {
        $groundFloor = new Floor(0);
        $this->resident = Resident::createOnTheFloor(new Floor(0));

    }

    /**
     * @Given I have to reach another floor
     */
    public function iHaveToReachAnotherFloor()
    {
        throw new PendingException();
    }

    /**
     * @Given the elevator is not on my floor
     */
    public function theElevatorIsNotOnMyFloor()
    {
        throw new PendingException();
    }

    /**
     * @When I call the elevator with the up button
     */
    public function iCallTheElevatorWithTheUpButton()
    {
        throw new PendingException();
    }

    /**
     * @Then the elevator reach the ground floor
     */
    public function theElevatorReachTheGroundFloor()
    {
        throw new PendingException();
    }

    /**
     * @Given The elevator is on my floor
     */
    public function theElevatorIsOnMyFloor()
    {
        throw new PendingException();
    }

    /**
     * @Given I enter the elevator
     */
    public function iEnterTheElevator()
    {
        throw new PendingException();
    }

    /**
     * @When I press the floor :arg1 button
     */
    public function iPressTheFloorButton($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then the elevator reach the floor number :arg1
     */
    public function theElevatorReachTheFloorNumber($arg1)
    {
        throw new PendingException();
    }

}
