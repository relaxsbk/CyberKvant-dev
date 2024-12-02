<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;

class ProductController extends Controller
{
    public function show(Product $product)
    {
//        $c = $product->characteristic->characteristic;
//        dd($c);

        $product = new ProductResource($product);



        return inertia("Product", ['product' => $product]);
    }
}
