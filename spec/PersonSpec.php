<?php

namespace spec;

use Carbon\Carbon;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PersonSpec extends ObjectBehavior
{
    private $name;
    private $birthdate;

    function let()
    {
        $this->name = 'Ryu';
        $this->birthdate = new Carbon('21 July 1964');

        $this->beConstructedWith($this->birthdate, $this->name);
    }

    function it_should_know_what_their_name_is()
    {
        $this->getName()->shouldReturn($this->name);
    }

    function it_should_know_when_they_are_born()
    {
        $this->getBirthdate()->shouldReturn($this->birthdate);
    }
}
