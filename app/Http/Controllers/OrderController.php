<?php

namespace App\Http\Controllers;

use App\Models\Detail_order;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
//    public function store(Request $request)
//    {
//
//        $request->validate([
//            'cart' => 'required|array',
//            'cart.*.id' => 'required|integer|exists:products,id',
//            'cart.*.quantity' => 'required|integer|min:1',
//            'cart.*.price' => 'required|numeric|min:0',
//            'total' => 'required|numeric|min:0',
//        ]);
//
//        DB::transaction(function () use ($request) {
//            $order = Order::create([
//                'user_id' => auth()->id(),
//                'order_status_id' => 1, // например, "Новый" статус
//                'total' => $request->input('total'),
//            ]);
//
//            foreach ($request->input('cart') as $item) {
//                Detail_order::create([
//                    'order_id' => $order->id,
//                    'product_id' => $item['id'],
//                    'quantity' => $item['quantity'],
//                    'total_price' => $item['price'] * $item['quantity'],
//                ]);
//            }
//            auth()->user()->cartItems()->delete();
//        });
//
//        return redirect()->back()->with('success', 'Заказ успешно создан!');
//    }

    public function store(Request $request)
    {
        $request->validate([
            'cart' => 'required|array',
            'cart.*.id' => 'required|integer|exists:products,id',
            'cart.*.quantity' => 'required|integer|min:1',
            'cart.*.price' => 'required|numeric|min:0',
            'total' => 'required|numeric|min:0',
        ]);

        // Проверка наличия товара до транзакции
        foreach ($request->input('cart') as $item) {
            $product = Product::find($item['id']);
            if (!$product || $product->quantity < $item['quantity']) {
                return redirect()->back()->with(['error' => "Недостаточно товара: {$product->title} (в наличии {$product->quantity})"]);
            }
        }

        // Всё доступно — можно оформлять заказ
        DB::transaction(function () use ($request) {
            $order = Order::create([
                'user_id' => auth()->id(),
                'order_status_id' => 1, // Статус "Новый"
                'total' => $request->input('total'),
            ]);

            foreach ($request->input('cart') as $item) {
                $product = Product::find($item['id']);

                // Создание записи о товаре в заказе
                Detail_order::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $item['quantity'],
                    'total_price' => $item['price'] * $item['quantity'],
                ]);

                // Уменьшение количества товара
                $product->decrement('quantity', $item['quantity']);
            }

            // Очистка корзины пользователя
            auth()->user()->cartItems()->delete();
        });

        return redirect()->back()->with('success', 'Заказ успешно создан!');
    }
}
