<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FavoriteController extends Controller
{
    function index()
    {
        $items = auth()->user()->favoriteItems()->with('product.images')->get();

        $favorite = $items->map(function ($item) {
            return [
                'id' => $item->product->id,
                'category' => $item->product->category,
                'title' => $item->product->title,
                'slug' => $item->product->slug,
                'mainImage' => $item->product->mainImage()->url,
                'price' => $item->product->price,
                'rating' => $item->product->rating,
                'reviewsCount' => $item->product->reviews->count()
            ];
        });

        $cartProductIds = auth()->check()
            ? auth()->user()->cartItems()->pluck('product_id')->toArray()
            : [];
        $cartFavoriteIds = auth()->check()
            ? auth()->user()->favoriteItems()->pluck('product_id')->toArray()
            : [];
        $cartCompareIds = auth()->check()
            ? auth()->user()->compareItems()->pluck('product_id')->toArray()
            : [];

        return Inertia::render('Favorites', [
            'products' => $favorite,
            'cartProductIds' => $cartProductIds,
            'cartFavoriteIds' => $cartFavoriteIds,
            'compareProductIds' => $cartCompareIds,
        ]);
    }

    public function add(Request $request)
    {
        if (auth()->guest()) {
            return back()->with('error', 'Требуется авторизация.');
        }

        $request->validate([
            'product_id' => ['required', 'exists:products,id'],
        ]);

        Favorite::updateOrCreate(
            ['user_id' => auth()->id(), 'product_id' => $request->product_id],
        );

        return back()->with('success', 'Товар добавлен в избранное.');
    }

    public function remove(Product $product)
    {
        auth()->user()->favoriteItems()->where('product_id', $product->id)->delete();

        return back()->with('success', 'Товар удалён из избранного.');
    }

    public function removeAll()
    {
        auth()->user()->favoriteItems()->where('user_id', auth()->user()->id)->delete();

        return back()->with('success', 'Товары удалён из избранного.');
    }

}
