<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

defined('APPLICATION_PATH')
|| define('APPLICATION_PATH', dirname(__DIR__));

//require_once APPLICATION_PATH . '/src/Logger.php';
require_once APPLICATION_PATH . '/src/Autoloader.php';

$routes = include APPLICATION_PATH . '/config/routes.php';

$route  = array_filter($routes, static function ($route) {
    $rightUrl  = ($route['route'] === str_replace('/api', '', $_SERVER['REQUEST_URI']));
    $rightVerb = ('GET' === $route['verb']);

    return ($rightUrl && $rightVerb);
});

(new Logger())
    ->debug($routes)
    ->debug($_SERVER['REQUEST_URI'])
    ->debug($_SERVER['REQUEST_METHOD']);