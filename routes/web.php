<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/projects', function () {
    return view('projects');
});

Route::get('/projects/{id}', function () {
    return view('tasks');
});
