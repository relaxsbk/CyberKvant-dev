<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        return inertia("Brands", []);
    }

    public function show()
    {
        return inertia("Brand_Products", []);
    }
}
