<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class BasketController extends Controller
{
    public function index()
    {
        $items = auth()->user()->cartItems()->with('product')->get();

        $cart = $items->map(function ($item) {
            return [
                'id' => $item->product->id,
                'title' => $item->product->title,
                'image' => $item->product->mainImage()->url,
                'price' => $item->product->price,
                'quantity' => $item->quantity,
            ];
        });

        return Inertia::render('Basket', [
            'cart' => $cart,
        ]);
    }

    public function add(Request $request)
    {
//        dd($request->all());
        //Алёрт добавить
        if (auth()->guest()) {
            return back()->with('error', 'Требуется авторизация.');
        }

        $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'quantity' => ['nullable', 'integer', 'min:1']
        ]);

        $item = CartItem::updateOrCreate(
            ['user_id' => auth()->id(), 'product_id' => $request->product_id],
//            ['quantity' => DB::raw('quantity + ' . ($request->quantity ?? 1))]
        );

        return back()->with('success', 'Товар добавлен в корзину.');
    }

    public function remove(Request $request, Product $product)
    {

        auth()->user()->cartItems()->where('product_id', $product->id)->delete();

        return back()->with('success', 'Товар удалён из корзины.');
    }

}
