<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Catalog;
use Illuminate\Http\Request;

class AdminCatalogController extends Controller
{
    public function index()
    {
        $catalogs = Catalog::query()->paginate(6);

        return view('admin.Catalog.catalogs', compact('catalogs'));
    }
    public function noPublished()
    {
        $catalogs = Catalog::query()->where('published', false)->paginate(6);

        return view('admin.Catalog.catalogsNoPublished', compact('catalogs'));
    }
}
