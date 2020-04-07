<?php
session_start();
require dirname(__DIR__) . '/vendor/autoload.php';
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');
$router = new Core\Router();

/*
 * Routes
 */
$router->add('', ['controller' => 'Home', 'action' => 'index']);

$router->add('orm-example', ['controller' => 'Home', 'action' => 'example']);

$router->dispatch($_SERVER['QUERY_STRING']);
