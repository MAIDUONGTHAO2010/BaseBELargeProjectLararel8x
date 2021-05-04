<?php

/** @var Laravel\Lumen\Routing\Router $router */

$router->group(
    [
        'namespace' => 'Auth',
        'prefix' => 'auth',
    ],
    function () use ($router) {
        $router->group(
            [
                'middleware' => [
                    'auth',
                    // 'permission:'.config('setting.permission.permission_names.view_backend'),
                    'api.throttle',
                    'api.auth',
                    'serializer',
                ],
            ],
            function () use ($router) {
                include 'user.php';
                include 'role.php';
                include 'permission.php';
                include 'authorization.php';
                include 'authenticator.php';
            }
        );


        include 'authenticator.php';

    }
);
