<?php

/** @var Laravel\Lumen\Routing\Router $router */

$router->group(
    [
        'as' => 'rates',
        'prefix' => 'rates',
    ],
    function () use ($router) {

        $router->get(
            '/',
            [
                'as' => 'index',
                'uses' => 'RateController@index',
            ]
        );

        $router->get(
            '/{id}',
            [
                'as' => 'show',
                'uses' => 'RateController@show',
            ]
        );

        $router->post(
            '/',
            [
                'as' => 'create',
                'uses' => 'RateController@store',
            ]
        );

        $router->put(
            '/{id}',
            [
                'as' => 'update',
                'uses' => 'RateController@update',
            ]
        );

        $router->delete(
            '/{id}',
            [
                'as' => 'delete',
                'uses' => 'RateController@destroy',
            ]
        );

        $router->get(
            '/download/{id}',
            [
                'as' => 'download',
                'uses' => 'RateController@download',
            ]
        );
    }
);
