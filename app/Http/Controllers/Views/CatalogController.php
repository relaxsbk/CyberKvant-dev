<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Models\Catalog;
use Inertia\Inertia;


class CatalogController extends Controller
{
    public function index()
    {
        $catalog = Catalog::query()
            ->select('id','slug', 'title', 'published', 'image')
            ->where('published', true)
            ->get();

        return Inertia::render('Catalog', ['catalogs' => $catalog]);
    }
    public function show($catalog)
    {
        $catalog = Catalog::query()
            ->select('id','slug', 'title', 'description', 'published')
            ->where('slug', $catalog)// TODO: вот тут скорее всего изменится на slug
            ->where('published', true)
            ->firstOrFail();

        $category = $catalog->category()
            ->select('id','slug', 'title', 'description', 'image', 'published')
            ->where('published', true)
            ->get();

        return Inertia::render('Categories', ['catalog' => $catalog, 'categories' => $category]);
    }
}
