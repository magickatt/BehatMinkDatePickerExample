<?php

namespace spec\Age;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AgeSpec extends ObjectBehavior
{
    function let()
    {
        $hours = 457770;
        $this->beConstructedWith($hours);
    }

    function it_should_know_how_many_hours_in_total()
    {
        $this->getHoursInTotal()->shouldReturn(457770);
    }

    function it_should_know_how_many_years_old_it_is()
    {
        $this->getYears()->shouldReturn(52);
    }
}
