<?php

require_once __DIR__.'/../vendor/autoload.php';

use Silex\Application;
use Silex\Provider\TwigServiceProvider;

$application = new Application();
$application['debug'] = true;

$application->register(new TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));

$twig = $application['twig'];

$application->get('/', function () use ($twig) {
    return $twig->render('datepicker.twig', array(
        'name' => 'World!',
    ));
});

$application->run();