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

$router->group(['prefix' => 'admin'], function () use ($router) {
    $router->get('environment', 'EnvironmentController@list');
    $router->get('environment/{uuid}', 'EnvironmentController@show');
    $router->put('environment/', 'EnvironmentController@save');
    $router->post('environment/', 'EnvironmentController@save');
    $router->put('environment/{uuid}', 'EnvironmentController@toggle');
    $router->delete('environment/{uuid}', 'EnvironmentController@toggle');

    $router->get('parameter', 'ParameterController@list');
    $router->get('parameter/{uuid}', 'ParameterController@show');
    $router->put('parameter/', 'ParameterController@save');
    $router->post('parameter/', 'ParameterController@save');
    $router->put('parameter/{uuid}', 'ParameterController@toggle');
    $router->delete('parameter/{uuid}', 'ParameterController@toggle');

    $router->get('feature', 'FeatureController@list');
    $router->get('feature/{uuid}', 'FeatureController@show');
    $router->put('feature/', 'FeatureController@save');
    $router->post('feature/', 'FeatureController@save');
    $router->put('feature/{uuid}', 'FeatureController@toggle');
    $router->delete('feature/{uuid}', 'FeatureController@toggle');

    $router->get('strategy', 'StrategyController@list');
    $router->get('strategy/{uuid}', 'StrategyController@show');
    $router->put('strategy/', 'StrategyController@save');
    $router->post('strategy/', 'StrategyController@save');
    $router->put('strategy/{uuid}', 'StrategyController@toggle');
    $router->delete('strategy/{uuid}', 'StrategyController@toggle');
});

$router->get('parameter/{key}[/{environment}]', 'ParameterController@process');
$router->get('feature/{key}[/{environment}]', 'FeatureController@process');
