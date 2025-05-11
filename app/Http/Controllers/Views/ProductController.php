<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Product $product)
    {

        $product = new ProductResource($product);

        return inertia("Product", ['product' => $product]);
    }
    public function search(Request $request)
    {
        $query = $request->get('query');

        $products = Product::query()
            ->when($query, fn($q) =>
            $q->where('title', 'like', "%{$query}%")
                ->orWhere('description', 'like', "%{$query}%")
            )
            ->paginate(12)
            ->appends(['query' => $query]); // чтобы query не исчезал при пагинации

        return inertia('Search', [
            'products' => ProductResource::collection($products),
            'query' => $query,
        ]);
    }
}
