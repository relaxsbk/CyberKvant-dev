<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Models\Brand;
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
        return inertia("Brand_Products", [
            'brand' => $brand,
            'products' => $brand->products()
        ]);
    }
}
