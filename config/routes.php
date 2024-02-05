<?php

return [
    [
        'route'      => '/movies/',
        'controller' => 'Application\Controller\Movie',
        'method'     => 'listing',
        'verb'       => 'GET'
    ],
    [
        'route'      => '/movies/',
        'controller' => 'Application\Controller\Movie',
        'method'     => 'add',
        'verb'       => 'POST'
    ],
];