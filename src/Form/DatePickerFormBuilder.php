<?php

namespace Form;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class DatePickerFormBuilder
{
    /** @var FormFactory */
    private $factory;

    /** @var int */
    private $minimumNameLength = 2;

    /** @var int */
    private $oldestYearAllowed = 1900;

    /**
     * DatePickerFormBuilder constructor.
     * @param FormFactory $factory
     */
    public function __construct(FormFactory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @return FormInterface
     */
    public function buildForm()
    {
        $form = $this->factory->createBuilder('form', [])
                              ->add('name', TextType::class, [
                                        'constraints' => [
                                            new NotBlank(),
                                            new Length(array('min' => $this->minimumNameLength))
                                        ]
                                    ])
                              ->add('birthdate', DateType::class, [
                                  'years' => range($this->oldestYearAllowed, date('Y'))
                              ])
                              ->getForm();
        return $form;
    }

    /**
     * @return int
     */
    public function getMinimumNameLength()
    {
        return $this->minimumNameLength;
    }

    /**
     * @param int $minimumNameLength
     * @return DatePickerFormBuilder
     */
    public function setMinimumNameLength($minimumNameLength)
    {
        $this->minimumNameLength = $minimumNameLength;
        return $this;
    }

    /**
     * @return int
     */
    public function getOldestYearAllowed()
    {
        return $this->oldestYearAllowed;
    }

    /**
     * @param int $oldestYearAllowed
     * @return DatePickerFormBuilder
     */
    public function setOldestYearAllowed($oldestYearAllowed)
    {
        $this->oldestYearAllowed = $oldestYearAllowed;
        return $this;
    }
}
