<?php

namespace Person;

use DateTime;
use InvalidArgumentException;
use Carbon\Carbon;
use Symfony\Component\Form\Form;

class PersonFactory
{
    /**
     * @param Form $form
     * @return Person
     */
    public function createPersonWithForm(Form $form)
    {
        $data = $form->getData();

        if (!isset($data['name']) || !isset($data['birthdate']) || !$data['birthdate'] instanceof DateTime) {
            throw new InvalidArgumentException('Cannot create person without name or birthdate');
        }

        return new Person(Carbon::instance($data['birthdate']), $data['name']);
    }
}
