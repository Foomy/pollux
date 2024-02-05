<?php

use App\Autoload;
use App\Router;

error_reporting(E_ALL);
ini_set('display_errors', 1);

defined('APPLICATION_PATH')
|| define('APPLICATION_PATH', dirname(__DIR__));

require_once APPLICATION_PATH . '/src/Autoload.php';
(new Autoload())
    ->loadFromConfig()
    ->loadFromFolder(APPLICATION_PATH . '/src/Controller/')
    ->loadFromFolder(APPLICATION_PATH . '/src/DataTransfer/');


require_once APPLICATION_PATH . '/src/Router.php';
$route = (new Router())->getRoute();

if (null === $route) {
    header('Content-Type: application/json; charset=utf-8', true, 404);
    echo json_encode([
        'code'    => 404,
        'message' => 'Resource not found!',
    ], JSON_THROW_ON_ERROR);
    die();
}

$controller = $route->controller;
$method     = $route->method;

if (array_key_exists('uuid', $route->params)) {
    (new $controller)->$method($route->params['uuid']);
    exit;
}

(new $controller)->$method();