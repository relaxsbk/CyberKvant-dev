<?php

use App\Http\Controllers\Admin\AdminBrandController;
use App\Http\Controllers\Admin\AdminCatalogController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\Views\BasketController;
use App\Http\Controllers\Views\BrandController;
use App\Http\Controllers\Views\CatalogController;
use App\Http\Controllers\Views\CategoryController;
use App\Http\Controllers\Views\CompareController;
use App\Http\Controllers\Views\FavoriteController;
use App\Http\Controllers\Views\HomeController;
use App\Http\Controllers\Views\ProductController;
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

Route::controller(BrandController::class)->group(function () {
    Route::get('/brands', 'index')->name('brands');
    Route::get('/brands/{brand}', 'show')->name('brand.show');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/product/{product}', 'show')->name('product');
});

Route::controller(BasketController::class)->group(function () {
    Route::get('/basket', 'index')->name('basket');
});

Route::controller(FavoriteController::class)->group(function () {
    Route::get('/favorites', 'index')->name('favorites');
});

Route::controller(CompareController::class)->group(function () {
    Route::get('/compare', 'index')->name('compare');
});

//user
Route::group(['middleware' => 'guest'], function () {
    Route::controller(RegisterController::class)->group(function () {
        Route::get('/register', 'index')->name('register');
        Route::post('/register', 'store')->name('register.store');
    });

    Route::controller(AuthController::class)->group(function () {
        Route::post('/auth', 'auth')->name('auth');

    });
});

Route::controller(ProfileController::class)->middleware(['auth'])->group(function () {
    Route::get('/profile', 'index')->name('profile');
    Route::patch('/profile', 'update')->name('profile.update');
    Route::get('/logout', 'logout')->name('logout');
});


//admin
Route::middleware(['guest'])->prefix('admin')->group(function () {
    Route::get('/dashboard', AdminDashboardController::class)->name('admin.dashboard');

    Route::controller(AdminOrderController::class)->group(function () {
        Route::get('/orders', 'index')->name('admin.orders');
        Route::put('/admin/orders/{order}/status', 'updateStatus')->name('admin.orders.updateStatus');

    });

    Route::controller(AdminCatalogController::class)->group(function () {
        Route::get('/catalogs', 'index')->name('admin.catalogs');
        Route::get('/catalogs-noPublished', 'noPublished')->name('admin.catalogs.noPublished');
        Route::post('/catalogs', 'store')->name('admin.catalogs.store');
        Route::put('/catalogs/{catalog}', 'update')->name('admin.catalogs.update');
        Route::delete('/catalogs/{catalog}', 'destroy')->name('admin.catalogs.destroy');

    });
    Route::controller(AdminBrandController::class)->group(function () {
        Route::get('/brands', 'index')->name('admin.brands');
        Route::get('/brands-noPublished', 'noPublished')->name('admin.brands.noPublished');
    });

    Route::controller(AdminCategoryController::class)->group(function () {
        Route::get('/categories', 'index')->name('admin.categories');
        Route::get('/categories-noPublished', 'noPublished')->name('admin.categories.noPublished');
        Route::get('/categories/{category}', 'show')->name('admin.categories.show');
    });

    Route::controller(AdminProductController::class)->group(function () {
        Route::get('/products', 'index')->name('admin.products');
        Route::get('/products-noPublished', 'noPublished')->name('admin.products.noPublished');
        Route::get('/products/{product}', 'show')->name('admin.products.show');
        Route::post('/products', 'store')->name('admin.products.store');
    });

    Route::controller(AdminUserController::class)->group(function () {
        Route::get('/users', 'index')->name('admin.users');
    });
});

