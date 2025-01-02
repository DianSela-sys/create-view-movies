<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

// Home route
Route::get('/home', [DashboardController::class, 'home'])->name('home');

// web.php
Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');

// Resourceful route for movies
Route::resource('/movies', MovieController::class);

// Specific route for creating a movie
// Route::get('/movies/create', [MovieController::class, 'create'])->name('movies.create');
