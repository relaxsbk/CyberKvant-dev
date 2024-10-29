<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use Inertia\Inertia;


class CatalogController extends Controller
{
    public function index()
    {
        return Inertia::render('Catalog');
    }
    public function show()
    {
        return Inertia::render('Categories');
    }
}
