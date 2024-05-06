<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'lol';
});

Route::get('/projects', 'App\Http\Controllers\ProjectController@index');
Route::post('/projects', 'App\Http\Controllers\ProjectController@store');
Route::put('/projects/{id}', 'App\Http\Controllers\ProjectController@update');
Route::delete('/projects/{id}', 'App\Http\Controllers\ProjectController@delete');
