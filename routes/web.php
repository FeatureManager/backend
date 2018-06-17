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
    $router->get('/{uuid}', 'EnvironmentController@show');
    $router->put('/', 'EnvironmentController@save');
    $router->post('/', 'EnvironmentController@save');
    $router->put('/{uuid}', 'EnvironmentController@toggle');
    $router->delete('/{uuid}', 'EnvironmentController@toggle');
});

$router->group(['prefix' => 'parameter'], function () use ($router) {
    $router->get('', 'ParameterController@list');
    $router->get('/{uuid}', 'ParameterController@show');
    $router->put('/', 'ParameterController@save');
    $router->post('/', 'ParameterController@save');
    $router->put('/{uuid}', 'ParameterController@toggle');
    $router->delete('/{uuid}', 'ParameterController@toggle');
});

$router->group(['prefix' => 'feature'], function () use ($router) {
    $router->get('', 'FeatureController@list');
    $router->get('/{uuid}', 'FeatureController@show');
    $router->put('/', 'FeatureController@save');
    $router->post('/', 'FeatureController@save');
    $router->put('/{uuid}', 'FeatureController@toggle');
    $router->delete('/{uuid}', 'FeatureController@toggle');
});

$router->group(['prefix' => 'strategy'], function () use ($router) {
    $router->get('', 'StrategyController@list');
    $router->get('/{uuid}', 'StrategyController@show');
    $router->put('/', 'StrategyController@save');
    $router->post('/', 'StrategyController@save');
    $router->put('/{uuid}', 'StrategyController@toggle');
    $router->delete('/{uuid}', 'StrategyController@toggle');
});
