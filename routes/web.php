<?php

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'environment'], function () use ($router) {
    $router->get('', 'EnvironmentController@list');
    $router->get('/{environment}', 'EnvironmentController@show');
    $router->put('/', 'EnvironmentController@save');
    $router->post('/', 'EnvironmentController@save');
    $router->put('/{environment}', 'EnvironmentController@enable');
    $router->delete('/{environment}', 'EnvironmentController@disable');
});

$router->group(['prefix' => 'parameter'], function () use ($router) {
    $router->get('', 'ParameterController@list');
    $router->get('/{parameter}', 'ParameterController@show');
    $router->put('/', 'ParameterController@save');
    $router->post('/', 'ParameterController@save');
    $router->put('/{parameter}', 'ParameterController@enable');
    $router->delete('/{parameter}', 'ParameterController@disable');
});

$router->group(['prefix' => 'feature'], function () use ($router) {
    $router->get('', 'FeatureController@list');
    $router->get('/{feature}', 'FeatureController@show');
    $router->put('/', 'FeatureController@save');
    $router->post('/', 'FeatureController@save');
    $router->put('/{feature}', 'FeatureController@enable');
    $router->delete('/{feature}', 'FeatureController@disable');
});
