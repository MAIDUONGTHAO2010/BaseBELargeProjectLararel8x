<?php

/** @var Laravel\Lumen\Routing\Router $router */

$router->group(
    [
        'namespace' => 'Frontend',
        'as' => 'frontend',
        'middleware' =>
            [
                'auth',
                'throttle',
            ],
    ],
    function () use ($router) {
        include 'user/user.php';
        include 'macro/macro.php';
        include 'script.php';
        include 'news/news.php';
        include 'rate.php';
    }
);
