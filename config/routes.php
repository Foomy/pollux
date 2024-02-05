<?php

use App\Controller\Movie;

return [
    [
        'route'      => '/api/1.0/movies/',
        'controller' => Movie::class,
        'method'     => 'index',
        'verb'       => 'GET'
    ],
    [
        'route'      => '/api/1.0/movies/{id}',
        'controller' => Movie::class,
        'method'     => 'index',
        'verb'       => 'GET'
    ],
    [
        'route'      => '/api/1.0/movies/',
        'controller' => Movie::class,
        'method'     => 'add',
        'verb'       => 'POST'
    ],
    [
        'route'      => '/api/1.0/movies/{id}',
        'controller' => Movie::class,
        'method'     => 'edit',
        'verb'       => 'PUT'
    ],
    [
        'route'      => '/api/1.0/movies/{id}',
        'controller' => Movie::class,
        'method'     => 'delete',
        'verb'       => 'DELETE'
    ],
];