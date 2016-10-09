<?php

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

    /** @var string */
    private $formPrefix = 'form_';

    /**
     * @Given I specify that my name is :name
     */
    public function iSpecifyThatMyNameIs($name)
    {
        Assert::assertNotEmpty($name);
        $this->name = (string)$name;

        $this->fillField($this->formPrefix.'name', $name);
    }

    /**
     * @Given I specify that my date of birth is the :day of :month :year
     */
    public function iSpecifyThatMyDateOfBirthIsTheOf($day, $month, $year)
    {
        try {
            $this->date = new CarbonDate($day.' '.$month.' '.$year);
        } catch (Exception $exception) {}

        $this->selectOption($this->formPrefix.'birthdate_year', $year);
        $this->selectOption($this->formPrefix.'birthdate_month', $month);
        $this->selectOption($this->formPrefix.'birthdate_day', $day);
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
        $now = CarbonDate::now();
        $years = $this->date->diffInYears($now);

        $then = $now->subYears($years);
        $days = $this->date->diffInDays($then);

        $then = $then->subDays($days);
        $hours = $this->date->diffInHours($then);

        $this->assertPageContainsText($years.' years');
        $this->assertPageContainsText($days.' days');
        $this->assertPageContainsText($hours.' hours');
    }
}
