<?php

namespace Person;

use Carbon\Carbon;

class Person
{
    /** @var string */
    private $name;

    /** @var Carbon */
    private $birthdate;

    /**
     * Person constructor.
     * @param Carbon $birthdate
     * @param $name
     */
    public function __construct(Carbon $birthdate, $name)
    {
        $this->name = (string)$name;
        $this->birthdate = $birthdate;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return Carbon
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }
}
