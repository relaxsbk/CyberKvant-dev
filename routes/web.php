<?php

use App\Http\Controllers\Views\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::inertia('/about', 'About')->name('about');
