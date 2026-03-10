<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::dashboard');

Route::livewire('/projects', 'pages::projects');

Route::livewire('/projects/{id}', 'pages::tasks');
