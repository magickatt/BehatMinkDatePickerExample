<?php

namespace spec\Age;

use Age\Age;
use Carbon\Carbon;
use Person\Person;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AgeCalculatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Age\AgeCalculator');
    }

    function it_should_calculate_an_age_based_on_a_persons_birthdate(Person $person)
    {
        $birthdate = new Carbon('21 Jul 1964');
        $person->getBirthdate()->willReturn($birthdate);
        $hoursInTotal = $birthdate->diffInHours(Carbon::now());

        $this->calculateAgeFromPerson($person)->shouldBeLikeThisAge(new Age($hoursInTotal));
    }

    public function getMatchers()
    {
        return [
            'beLikeThisAge' => function ($actual, Age $expected) {
                if (!$actual instanceof Age) {
                    return false;
                }
                if ($actual->getHoursInTotal() == $expected->getHoursInTotal()) {
                    return true;
                }
                return false;
            },
        ];
    }
}
