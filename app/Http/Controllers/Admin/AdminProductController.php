<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Provider;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $providers = Provider::all();

        $products = Product::query()->paginate(10);

        return view('admin.Product.products', compact('products', 'categories', 'brands', 'providers'));
    }

    public function noPublished()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $providers = Provider::all();

        $products = Product::query()->where('published', false)->paginate(10);

        return view('admin.Product.productsNoPublished', compact('products', 'categories', 'brands', 'providers'));
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Product $product)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $providers = Provider::all();

        return view('admin.Product.product', compact('product', 'categories', 'brands', 'providers'));
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
