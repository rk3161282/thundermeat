<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/', function () {
    return 'Server Running';
});

$router->group(['prefix' => 'v1'], function () use ($router) {

    $router->post('/login', '\App\Http\Controllers\Api\UserController@login');

    $router->post('/createAccount', '\App\Http\Controllers\Api\UserController@createAccount');

});
$router->group(['middleware' => ['JWTAuth'], 'prefix' => 'v1'], function () use ($router) {
   
    $router->post('/logout', '\App\Http\Controllers\Api\UserController@logout');

    $router->get('/sliders', '\App\Http\Controllers\Api\ApiController@sliders');

    $router->get('/categories', '\App\Http\Controllers\Api\ApiController@categories');

    $router->post('/shopslist', '\App\Http\Controllers\Api\ApiController@shopslist');
});
