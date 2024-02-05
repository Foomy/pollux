<?php

namespace App;

final class Router
{
    public const HOST = 'http://www.pollux.local';
    private array $routesCfg;

    public function __construct()
    {
        $this->routesCfg = include APPLICATION_PATH . '/config/routes.php';
    }

    public function getRoute(): ?object
    {
        $route = null;

        foreach ($this->routesCfg as $routeCfg) {
            $path      = $_SERVER['REQUEST_URI'];
            $uuidRegex = '[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}';
            $params    = [];

            if (1 === preg_match("/$uuidRegex/", $path, $matches)) {
                $params['uuid'] = reset($matches);
//(new Logger())->debug($params);

                [$path,] = preg_split("/$uuidRegex/", $path);
//(new Logger())
//    ->debug('request uri: ' . $path)
//    ->debug('path: ' . $path);
            }

            if (($routeCfg['route'] === $path) && ('GET' === $routeCfg['verb'])) {
                $routeCfg['params'] = $params;
                $route              = (object)$routeCfg;
            }
//(new Logger())->debug($route);
//
//            exit;
        }

        return $route;
    }
}


