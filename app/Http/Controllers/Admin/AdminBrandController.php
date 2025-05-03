<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class AdminBrandController extends Controller
{

    public function index()
    {
        $brands = Brand::query()->paginate(6);

        return view('admin.Brand.brands', compact('brands'));
    }

    public function noPublished()
    {
        $brands = Brand::query()->where('published', false)->paginate(6);

        return view('', compact('brands'));
    }



    public function store(Request $request)
    {
        //
    }


    public function show(string $id)
    {
        //
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
