<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Models\Compare;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CompareController extends Controller
{
    function index()
    {
        $items = auth()->user()->compareItems()->with('product.images')->get();

        $compare = $items->map(function ($item) {
            return [
                'id' => $item->product->id,
                'category' => $item->product->category,
                'title' => $item->product->title,
                'slug' => $item->product->slug,
                'mainImage' => $item->product->mainImage()->url,
                'price' => $item->product->price,
                'rating' => $item->product->rating,
                'reviewsCount' => $item->product->reviews->count(),
                'characteristics' => $item->product->characteristic,
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

        return Inertia::render('Compare', [
            'products' => $compare,
            'cartProductIds' => $cartProductIds,
            'favoriteProductIds' => $cartFavoriteIds,
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

        Compare::updateOrCreate(
            ['user_id' => auth()->id(), 'product_id' => $request->product_id],
        );

        return back()->with('success', 'Товар добавлен в сравнить.');
    }

    public function remove(Product $product)
    {
        auth()->user()->compareItems()->where('product_id', $product->id)->delete();

        return back()->with('success', 'Товар удалён из сравнения.');
    }

    public function removeAll()
    {
        auth()->user()->compareItems()->where('user_id', auth()->user()->id)->delete();

        return back()->with('success', 'Товары удалены из сравнения.');
    }

}
