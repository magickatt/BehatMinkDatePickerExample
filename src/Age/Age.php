<?php

namespace Age;

class Age
{
    /** @var int */
    private $years;

    /** @var int */
    private $days;

    /** @var int */
    private $hours;

    /**
     * Age constructor.
     * @param int $years
     * @param int $days
     * @param int $hours
     */
    public function __construct($years, $days, $hours)
    {
        $this->years = (int)$years;
        $this->days = (int)$days;
        $this->hours = (int)$hours;
    }

    /**
     * @return int
     */
    public function getYears()
    {
        return $this->years;
    }

    /**
     * @return int
     */
    public function getDays()
    {
        return $this->days;
    }

    /**
     * @return int
     */
    public function getHours()
    {
        return $this->hours;
    }
}