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


//    public function show($slug)
//    {
//        $brand = Brand::where('id', $slug)->firstOrFail();
//
//        $categories = Category::whereHas('products', function ($query) use ($brand) {
//            $query->where('brand_id', $brand->id);
//        })->with(['products' => function ($query) use ($brand) {
//            $query->where('brand_id', $brand->id);
//        }])->get();
//
//
//
//        return inertia('Brand_Products', [
//            'brand' => $brand,
//            'categories' => $categories,
//        ]);
//    }

    public function show(Brand $brand)
    {

        $products = $brand->products()->take(4)->get();

        $products = ProductResource::collection($products);

        return inertia("Brand_Products", [
            'brand' => $brand,
            'products' => $products
        ]);
    }
}
