<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Catalog;
use Illuminate\Http\Request;

class AdminCatalogController extends Controller
{
    public function index()
    {
        $catalogs = Catalog::query()->paginate(5);

        return view('admin.catalogs', compact('catalogs'));
    }
    public function noPublished()
    {

    }
}
