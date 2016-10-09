<?php

namespace Age;

class Age
{
    private $hoursInTotal;

    private $hours;

    private $days;

    private $years;

    public function __construct($hoursInTotal)
    {
        $this->calculateHoursMinutesAndDays($hoursInTotal);
    }

    public function getHoursInTotal()
    {
        return $this->hoursInTotal;
    }

    public function getYears()
    {
        return $this->years;
    }

    private function calculateHoursMinutesAndDays($hoursInTotal)
    {
        $this->hoursInTotal = $hoursInTotal;
        $this->years = (int)floor($this->hoursInTotal / 8760);
    }
}
