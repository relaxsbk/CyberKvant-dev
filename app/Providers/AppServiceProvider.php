<?php

namespace App\Providers;

use App\Http\Resources\Characteristics\CharacteristicResource;
use App\Http\Resources\Product\MiniProductResource;
use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\Review\ReviewResource;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        ProductResource::withoutWrapping();
        MiniProductResource::withoutWrapping();
        ReviewResource::withoutWrapping();
        CharacteristicResource::withoutWrapping();
    }
}
