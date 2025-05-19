<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function show(Product $product)
    {

        $product = new ProductResource($product);

        $cartProductIds = auth()->check()
            ? auth()->user()->cartItems()->pluck('product_id')->toArray()
            : [];

        $cartFavoriteIds = auth()->check()
            ? auth()->user()->favoriteItems()->pluck('product_id')->toArray()
            : [];
        $cartCompareIds = auth()->check()
            ? auth()->user()->compareItems()->pluck('product_id')->toArray()
            : [];


        return inertia("Product", [
            'product' => $product,
            'cartProductIds' => $cartProductIds,
            'favoriteProductIds' => $cartFavoriteIds,
            'compareProductIds' => $cartCompareIds,
        ]);
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

        $cartProductIds = auth()->check()
            ? auth()->user()->cartItems()->pluck('product_id')->toArray()
            : []; // если пользователь не авторизован

        $cartFavoriteIds = auth()->check()
            ? auth()->user()->favoriteItems()->pluck('product_id')->toArray()
            : [];
        $cartCompareIds = auth()->check()
            ? auth()->user()->compareItems()->pluck('product_id')->toArray()
            : [];

        return inertia('Search', [
            'products' => ProductResource::collection($products),
            'query' => $query,
            'cartProductIds' => $cartProductIds,
            'favoriteProductIds' => $cartFavoriteIds,
            'compareProductIds' => $cartCompareIds,
        ]);
    }
}
