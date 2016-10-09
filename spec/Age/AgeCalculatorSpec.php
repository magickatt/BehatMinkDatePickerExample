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
        $now = new Carbon('9 Oct 2016 19:10:00');
        $birthdate = new Carbon('21 Jul 1964 00:00:00');
        $person->getBirthdate()->willReturn($birthdate);

        $this->calculateAgeFromPerson($person, $now)->shouldBeLikeThisAge(new Age(52, 80, 19));
    }

    public function getMatchers()
    {
        return [
            'beLikeThisAge' => function ($actual, Age $expected) {
                if (!$actual instanceof Age) {
                    return false;
                }
                if ($actual->getYears() == $expected->getYears()) {
                    return true;
                }
                return false;
            },
        ];
    }
}
