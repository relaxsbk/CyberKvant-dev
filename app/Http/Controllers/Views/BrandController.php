<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductResource;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::query()
            ->select('id', 'slug', 'title', 'image')
            ->where('published', true)
            ->get();

        return inertia("Brands", ["brands" => $brands]);
    }

    public function show(Brand $brand)
    {
        $categories = Category::query()
            ->where('published', true)
            ->whereHas('products', function ($query) use ($brand) {
                $query->where('brand_id', $brand->id)
                      ->where('published', true);
        })
            ->distinct()
            ->get();


        return inertia("Brand_Products", [
            'brand' => $brand,
            'categories' => $categories
        ]);
    }
}
