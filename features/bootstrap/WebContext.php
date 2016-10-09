<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;

/**
 * Defines application features from the specific context.
 */
class WebContext extends MinkContext
{
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
     * @Given I specify that my date of birth is the :day of :month :year
     */
    public function iSpecifyThatMyDateOfBirthIsTheOf($day, $month, $year)
    {
        throw new PendingException();
    }

    /**
     * @When I ask for my age in number of hours to be calculated
     */
    public function iAskForMyAgeInNumberOfHoursToBeCalculated()
    {
        throw new PendingException();
    }

    /**
     * @Then I should be told how many hours old I am
     */
    public function iShouldBeToldHowManyHoursOldIAm()
    {
        throw new PendingException();
    }
}
