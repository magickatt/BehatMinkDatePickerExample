<?php

namespace Age;

class Age
{
    private $years;

    private $days;

    private $hours;

    public function __construct($years, $days, $hours)
    {
        $this->years = (int)$years;
        $this->days = (int)$days;
        $this->hours = (int)$hours;
    }

    public function getYears()
    {
        return $this->years;
    }

    public function getDays()
    {
        return $this->days;
    }

    public function getHours()
    {
        return $this->hours;
    }
}