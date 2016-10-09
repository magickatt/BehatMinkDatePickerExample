<?php

namespace spec\Application;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Silex\Application;

class ApplicationBuilderSpec extends ObjectBehavior
{
    function it_should_return_a_preconfigured_application()
    {
        $this->buildApplication()->shouldBeAnInstanceOf(Application::class);
    }
}
