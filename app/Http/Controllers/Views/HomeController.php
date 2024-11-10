<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductResource;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Inertia\Inertia;

class HomeController extends Controller
{

    public function __invoke()
    {
        $categories = Category::query()->select('id', 'title')->take(12)->get();
        $brands = Brand::query()->select('id', 'title')->take(6)->get();

//        $products = Product::query()->select('id', 'title')->take(7)->get();

        $products = ProductResource::collection(
            Product::with(['category:id,title', 'reviews:id,product_id'])
                ->select('id', 'title', 'category_id', 'price', 'rating')
                ->take(7)
                ->get()
        );

//        dd($products);


        return Inertia::render('Home', [
            'categories' => $categories,
            'products' => $products,
            'brands' => $brands,
        ]);
    }

}
