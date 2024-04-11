<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::match(['get','put'], '/projects/create/{project?}', [ProjectController::class, 'create'])->name('projects.create');

Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');

Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');

Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');

Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');