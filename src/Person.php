<?php

use Carbon\Carbon;

class Person
{
    private $name;

    private $birthdate;

    public function __construct(Carbon $birthdate, $name)
    {
        $this->name = (string)$name;
        $this->birthdate = $birthdate;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getBirthdate()
    {
        return $this->birthdate;
    }
}
