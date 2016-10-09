<?php

namespace spec\Form;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormFactory;

class DatePickerFormBuilderSpec extends ObjectBehavior
{
    function let(FormFactory $factory, FormBuilderInterface $builder, Form $form)
    {
        $factory->createBuilder('form', [])->willReturn($builder);

        $builder->add('name')->willReturn($builder);
        $builder->add('birthdate')->willReturn($builder);
        $builder->getForm()->willReturn($form);

        $this->beConstructedWith($factory);
    }

    function it_should_build_a_datepicker_form()
    {
        $this->buildForm()->shouldBeAnInstanceOf('Symfony\Component\Form\Form');
    }
}
