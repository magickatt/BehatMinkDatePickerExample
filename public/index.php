<?php

require_once __DIR__.'/../vendor/autoload.php';

use Form\DatePickerFormBuilder;
use Application\ApplicationBuilder;
use Symfony\Component\HttpFoundation\Request;

$application = (new ApplicationBuilder)->buildApplication();

$application->get('/', function () use ($application) {

    $form = (new DatePickerFormBuilder($application['form.factory']))->buildForm();
    return $application['twig']->render('datepicker.twig', array('form' => $form->createView()));

});

$application->post('/', function (Request $request) use ($application) {

    $form = (new DatePickerFormBuilder($application['form.factory']))->buildForm();
    $form->handleRequest($request);

    if ($form->isValid()) {
        $data = $form->getData();
        return $application->redirect('/');
    }

});

$application->run();