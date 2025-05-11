<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\MiniProductResource;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Inertia\Inertia;

class HomeController extends Controller
{

    public function __invoke()
    {

//        dd(request()->user());
        $categories = Category::query()
            ->select('id', 'title','slug', 'published')
            ->where('published', true)
            ->inRandomOrder()
            ->take(12)
            ->get();

        $brands = Brand::query()
            ->select('id', 'title','slug', 'image', 'published')
            ->where('published', true)
            ->take(6)
            ->get();

//        $products = Product::query()->select('id', 'title')->take(7)->get();

        $products = MiniProductResource::collection(
            Product::with(['category:id,title', 'reviews:id,product_id'])
                ->select('id', 'slug', 'title', 'category_id', 'price', 'rating', 'published')
                ->where('published', true)
                ->where('rating', 5)
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
