<?php

/** @var Laravel\Lumen\Routing\Router $router */

$router->group(
    [
        'as' => 'script',
        'prefix' => 'scripts',
    ],
    function () use ($router) {

        $router->get(
            '/',
            [
                'as' => 'index',
                'uses' => 'ScriptController@index',
            ]
        );

        $router->get(
            '/{id}',
            [
                'as' => 'show',
                'uses' => 'ScriptController@show',
            ]
        );

        $router->post(
            '/',
            [
                'as' => 'create',
                'uses' => 'ScriptController@store',
            ]
        );

        $router->put(
            '/{id}',
            [
                'as' => 'update',
                'uses' => 'ScriptController@update',
            ]
        );

        $router->delete(
            '/{id}',
            [
                'as' => 'delete',
                'uses' => 'ScriptController@destroy',
            ]
        );

        $router->get(
            '/download/{id}',
            [
                'as' => 'download',
                'uses' => 'ScriptController@download',
            ]
        );
    }
);
