<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {

    }

    public function show($category)
    {
//        $category = Category::where('slug', $category)->first();
        $category = Category::query()
            ->select('id', 'slug', 'title', 'description')
            ->where('id', $category)
            ->where('published', true)
            ->FirstOrFail();

        $products = $category->products()
            ->select('id', 'slug', 'title', 'description', 'price', 'rating')
            ->where('published', true)
            ->get();

        return inertia('Category_Products', []);

    }
}
