<?php

namespace spec\Age;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AgeSpec extends ObjectBehavior
{
    private $years = 52;
    private $days = 10;
    private $hours = 1;

    function let()
    {
        $this->beConstructedWith($this->years, $this->days, $this->hours);
    }

    function it_should_know_how_many_years_old_it_is()
    {
        $this->getYears()->shouldReturn($this->years);
    }

    function it_should_know_how_many_days_old_it_is()
    {
        $this->getDays()->shouldReturn($this->days);
    }

    function it_should_know_how_many_hours_old_it_is()
    {
        $this->getHours()->shouldReturn($this->hours);
    }
}
