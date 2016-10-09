<?php

require_once __DIR__.'/../vendor/autoload.php';

use Person\PersonFactory;
use Form\DatePickerFormBuilder;
use Application\ApplicationBuilder;
use Symfony\Component\HttpFoundation\Request;

// Instantiate the Silex application and registered the relevant providers
$application = (new ApplicationBuilder)->buildApplication();

// Display date picker form
$application->get('/', function () use ($application) {

    $form = (new DatePickerFormBuilder($application['form.factory']))->buildForm();
    return $application['twig']->render('datepicker.twig', array('form' => $form->createView()));

});

// Handle date picker form submission
$application->post('/', function (Request $request) use ($application) {

    $form = (new DatePickerFormBuilder($application['form.factory']))->buildForm();
    $form->handleRequest($request);

    if ($form->isValid()) {
        $person = (new PersonFactory())->createPersonWithForm($form);
        $application['session']->set('person', $person);
        return $application->redirect('/age');
    }
    return $application['twig']->render('datepicker.twig', array('form' => $form->createView()));

});

// Display age
$application->get('/age', function () use ($application) {

    $person = $application['session']->get('person');
    if (!$person) {
        return $application->redirect('/');
    }

    $application['session']->clear();
    return $application['twig']->render('age.twig', array('person' => $person));

});

$application->run();
