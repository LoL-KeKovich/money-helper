<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'lol';
});

Route::get('/projects', 'App\Http\Controllers\ProjectController@index');
