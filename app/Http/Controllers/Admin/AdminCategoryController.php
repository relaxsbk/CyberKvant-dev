<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Catalog;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $catalogs = Catalog::all();
        $categories = Category::query()->paginate(15);

        return view('admin.Category.categories', compact('categories', 'catalogs'));
    }

    public function noPublished()
    {
        $catalogs = Catalog::all();
        $categories = Category::query()->where('published', false)->paginate(15);

        return view('admin.Category.categoriesNoPublished', compact('categories', 'catalogs'));
    }
}
