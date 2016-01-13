Feature: resident
	In order to reach a floor
	I need to use the elevator

Scenario: Calling the elevator
	Given I am on the ground floor
	And I have to reach another floor
	And the elevator is not on my floor
	When I call the elevator with the up button
	Then the elevator reach the ground floor

Scenario: Using the elevator
	Given The elevator is on my floor
	And I enter the elevator
	When I press the floor 6 button
	Then the elevator reach the floor number 6
