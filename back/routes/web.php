<?php

use Illuminate\Support\Facades\Route;

header('Access-Control-Allow-Origin: http://localhost:3000');
header('Content-Type: application/json, image/jpeg');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, PATCH, DELETE');
//header('Access-Control-Allow-Credentials', 'true');
header('Access-Control-Allow-Headers: Origin, Accept, Content-Type, X-Requested-With, Authorization');


Route::get('/', function () {
    return 'lol';
});

Route::group([
    'middleware' => 'web',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::post('me', 'App\Http\Controllers\AuthController@me');
});

Route::group([
    'prefix' => 'user'
], function () {
    Route::post('create', 'App\Http\Controllers\UserController@store');
    Route::put('update', 'App\Http\Controllers\UserController@update');
});

Route::get('/projects', 'App\Http\Controllers\ProjectController@index');
Route::get('/projects/all', 'App\Http\Controllers\ProjectController@getAll');
Route::put('/projects/donate/{id}', 'App\Http\Controllers\ProjectController@donate');
Route::post('/projects', 'App\Http\Controllers\ProjectController@store');
Route::put('/projects/{id}', 'App\Http\Controllers\ProjectController@update');
Route::delete('/projects/{id}', 'App\Http\Controllers\ProjectController@delete');
