<?php
include 'handlers/standardHandler.php';
include '../vendor/autoload.php';

const APP_ID = '';
$loggingPath = getcwd() . '/logging/log.sqlite';

$alexa = new \alexa\alexa(APP_ID);
$sqlite = new \alexa\logger\sqlite($loggingPath);
$alexa->logger->addLogger($sqlite);
$handler = new standardHandler();
$alexa->registerHandler($handler, 'default');
$alexa->run();