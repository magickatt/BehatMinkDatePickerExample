<?php

use Exception;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;
use PHPUnit_Framework_Assert as Assert;
use Carbon\Carbon as CarbonDate;

/**
 * Defines application features from the specific context.
 */
class WebContext extends MinkContext
{
    /** @var string */
    private $name;

    /** @var CarbonDate */
    private $date;

    private $formPrefix = 'form_birthdate_';

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
     * @Given I specify that my name is :name
     */
    public function iSpecifyThatMyNameIs($name)
    {
        Assert::assertNotEmpty($name);
        $this->name = (string)$name;
    }

    /**
     * @Given I specify that my date of birth is the :day of :month :year
     */
    public function iSpecifyThatMyDateOfBirthIsTheOf($day, $month, $year)
    {
        try {
            $date = new CarbonDate($day.' '.$month.' '.$year);
            $this->date = $date;
        } catch (Exception $exception) {}

        $this->selectOption($this->formPrefix.'year', $year);
        $this->selectOption($this->formPrefix.'month', $month);
        $this->selectOption($this->formPrefix.'day', $day);
    }

    /**
     * @When I ask for my age in number of hours to be calculated
     */
    public function iAskForMyAgeInNumberOfHoursToBeCalculated()
    {
        $this->pressButton('submit');
    }

    /**
     * @Then I should be told how old I am
     */
    public function iShouldBeToldHowOldIAm()
    {
        throw new PendingException();
    }
}
