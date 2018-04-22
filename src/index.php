<?php
include 'handlers/standardHandler.php';
include '../vendor/autoload.php';

const APP_ID = '';

$alexa = new \alexa\alexa(APP_ID);
$handler = new standardHandler();
$alexa->registerHandler($handler, 'default');
$alexa->run();