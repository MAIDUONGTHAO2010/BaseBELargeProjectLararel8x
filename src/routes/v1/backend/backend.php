<?php

/** @var Laravel\Lumen\Routing\Router $router */

$router->group(
    [
        'namespace' => 'Backend',
        'as' => 'backend',
    ],
    function () use ($router) {
        include 'auth/auth.php';
        include 'log.php';
    }
);
