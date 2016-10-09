<?php

namespace Form;

use Symfony\Component\Form\FormFactory;

class DatePickerFormBuilder
{
    private $factory;

    public function __construct(FormFactory $factory)
    {
        $this->factory = $factory;
    }

    public function buildForm()
    {
        $form = $this->factory->createBuilder('form', [])
                              ->add('name')
                              ->add('birthdate')
                              ->getForm();
        return $form;
    }
}