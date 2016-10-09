<?php

require_once __DIR__.'/../vendor/autoload.php';

$application = new Silex\Application();

$application->get('/', function () {
    return 'Hello World!';
});

$application->run();