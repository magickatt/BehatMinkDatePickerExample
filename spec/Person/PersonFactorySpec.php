<?php

namespace spec\Person;

use Carbon\Carbon;
use DateTime;
use Person\Person;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Form\Form;

class PersonFactorySpec extends ObjectBehavior
{
    function it_should_create_a_person_from_form_data(Form $form)
    {
        $name = 'Ryu';
        $birthday = new DateTime();

        $form->getData()->willReturn([
            'name' => $name,
            'birthdate' => $birthday
        ]);

        $this->createPersonWithForm($form)->shouldBeLikeThisPerson(new Person(new Carbon(), 'Ryu'));
    }

    public function getMatchers()
    {
        return [
            'beLikeThisPerson' => function ($actual, Person $expected) {
                if (!$actual instanceof Person) {
                    return false;
                }
                if ($actual->getName() == $expected->getName() &&
                    $actual->getBirthdate() == $expected->getBirthdate()) {
                    return true;
                }
                return false;
            },
        ];
    }
}
