<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.process');
});

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    // Route::get('/', [DashboardController::class, 'getCompletedTasksByRole'])->name('dashboard.index');
    Route::livewire('/', 'pages::dashboard');
    Route::livewire('/projects', 'pages::projects');
    Route::livewire('/projects/new', 'projects.new-project');
    Route::livewire('/projects/{id}/task/new', 'tasks.new-task');
    Route::livewire('/projects/{id}', 'pages::tasks');
});
