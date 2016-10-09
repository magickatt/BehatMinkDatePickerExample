<?php

namespace Age;

use Carbon\Carbon;
use Person\Person;

class AgeCalculator
{
    public function calculateAgeFromPerson(Person $person)
    {
        $hoursInTotal = $person->getBirthdate()->diffInHours(Carbon::now());
        return new Age($hoursInTotal);
    }
}
