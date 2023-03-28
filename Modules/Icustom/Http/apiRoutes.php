<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => 'icustom/v1'], function (Router $router) {
  //Route index
  $router->get('/test', [
    'as' => 'api.icustom.test',
    'uses' => 'TestApiController@test'
  ]);
});
