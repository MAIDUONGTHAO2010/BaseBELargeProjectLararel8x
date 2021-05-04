<?php

/** @var Laravel\Lumen\Routing\Router $router */

$router->group(
    [
        'namespace' => 'Macro',
        'as' => 'macro',
        'prefix' => 'macros',
    ],
    function () use ($router) {

        $router->get(
            '/',
            [
                'as' => 'index',
                'uses' => 'MacroController@index',
            ]
        );

        $router->post(
            '/',
            [
                'as' => 'create',
                'uses' => 'MacroController@store',
            ]
        );

        $router->get(
            '/download/{id}',
            [
                'as' => 'download',
                'uses' => 'MacroController@download',
            ]
        );
    }
);
