<?php

namespace Age;

use Carbon\Carbon;
use Person\Person;

class AgeCalculator
{
    public function calculateAgeFromPerson(Person $person, Carbon $now)
    {
        $birthdate = $person->getBirthdate();

        $years = $birthdate->diffInYears($now);

        $then = $now->subYears($years);
        $days = $birthdate->diffInDays($then);

        $then = $then->subDays($days);
        $hours = $birthdate->diffInHours($then);

        return new Age($years, $days, $hours);
    }
}
