<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::dashboard');
Route::livewire('/projects', 'pages::projects');
Route::livewire('/projects/new', 'projects.new-project');
Route::livewire('/projects/{id}/task/new', 'tasks.new-task');
Route::livewire('/projects/{id}', 'pages::tasks');
