<?php

use Illuminate\Support\Facades\Route;

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
Route::post('/projects', 'App\Http\Controllers\ProjectController@store');
Route::put('/projects/{id}', 'App\Http\Controllers\ProjectController@update');
Route::delete('/projects/{id}', 'App\Http\Controllers\ProjectController@delete');
