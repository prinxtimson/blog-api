<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('post', 'PostController@index');
    $router->get('post/{id}', 'PostController@show');
    $router->post('post', 'PostController@store');
    $router->put('post/{id}', 'PostController@update');
    $router->delete('post/{id}', 'PostController@destroy');
});