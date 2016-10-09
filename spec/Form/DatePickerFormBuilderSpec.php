<?php

namespace spec\Form;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class DatePickerFormBuilderSpec extends ObjectBehavior
{
    function let(FormFactory $factory, FormBuilderInterface $builder, Form $form)
    {
        $factory->createBuilder('form', [])->willReturn($builder);

        // @todo Should mock these
        $minimumNameLength = 2;
        $oldestYearAllowed = 1900;
        $nameOptions = ['constraints' => [
            new NotBlank(),
            new Length(['min' => $minimumNameLength])
        ]];
        $birthdateOptions = [
            'years' => range($oldestYearAllowed, date('Y'))
        ];

        $builder->add('name', TextType::class, $nameOptions)->willReturn($builder);
        $builder->add('birthdate', DateType::class, $birthdateOptions)->willReturn($builder);
        $builder->getForm()->willReturn($form);

        $this->beConstructedWith($factory);

        $this->setMinimumNameLength($minimumNameLength);
        $this->setOldestYearAllowed($oldestYearAllowed);
    }

    function it_should_build_a_datepicker_form()
    {
        $this->buildForm()->shouldBeAnInstanceOf('Symfony\Component\Form\Form');
    }
}
