<?php

/** @var Laravel\Lumen\Routing\Router $router */

$router->group(
    [
        'namespace' => 'News',
        'as' => 'news',
        'prefix' => 'news',
    ],
    function () use ($router) {

        $router->get(
            '/',
            [
                'as' => 'index',
                'uses' => 'NewsController@index',
            ]
        );

        $router->get(
            '/get-list',
            [
                'as' => 'getListNews',
                'uses' => 'NewsController@getListNews',
            ]
        );

        $router->post(
            '/',
            [
                'as' => 'create',
                'uses' => 'NewsController@store',
            ]
        );

        $router->get(
            '/{id}',
            [
                'as' => 'show',
                'uses' => 'NewsController@show',
            ]
        );

        $router->put(
            '/{id}',
            [
                'as' => 'update',
                'uses' => 'NewsController@update',
            ]
        );

        $router->delete(
            '/{id}',
            [
                'as' => 'destroy',
                'uses' => 'NewsController@destroy',
            ]
        );

       
    }
);
