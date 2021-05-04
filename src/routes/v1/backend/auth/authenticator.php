<?php

/** @var Laravel\Lumen\Routing\Router $router */

$router->group(
    [
        'namespace' => 'Authenticator',
        'as' => 'authenticator',
    ],
    function () use ($router) {
        $router->group(
            [], function () use ($router) {
                // deletes
                $router->post(
                    '/social-login',
                    [
                        'as' => 'google',
                        'uses' => 'SocialLoginController@google',
                    ]
                );
            }
        );
    }
);