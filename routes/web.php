<?php

use App\Http\Controllers\Views\CatalogController;
use App\Http\Controllers\Views\CategoryController;
use App\Http\Controllers\Views\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::inertia('/about', 'About')->name('about');

Route::controller(CatalogController::class)->group(function () {
    Route::get('/catalog', 'index')->name('catalog');
    Route::get('/catalog/{catalog}', 'show')->name('catalog.show');
});

Route::controller(CategoryController::class)->group(function () {
    Route::get('/category/{category}', 'show')->name('category.show');
});

