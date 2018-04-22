<?php
error_reporting(E_ALL);
ini_set('display_errors', true);
include 'handlers/standardHandler.php';
include '../vendor/autoload.php';
$alexa = new \alexa\alexa('amzn1.ask.skill.0fbaa5b3-a690-4493-b689-33dafa1126e7');
$alexa->debug = true;
$handler = new standardHandler();
$alexa->registerHandler($handler, 'default');
$alexa->run();