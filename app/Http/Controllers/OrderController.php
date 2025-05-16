<?php

namespace App\Http\Controllers;

use App\Models\Detail_order;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'cart' => 'required|array',
            'cart.*.id' => 'required|integer|exists:products,id',
            'cart.*.quantity' => 'required|integer|min:1',
            'cart.*.price' => 'required|numeric|min:0',
            'total' => 'required|numeric|min:0',
        ]);

        DB::transaction(function () use ($request) {
            $order = Order::create([
                'user_id' => auth()->id(),
                'order_status_id' => 1, // например, "Новый" статус
                'total' => $request->input('total'),
            ]);

            foreach ($request->input('cart') as $item) {
                Detail_order::create([
                    'order_id' => $order->id,
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'total_price' => $item['price'] * $item['quantity'],
                ]);
            }
            auth()->user()->cartItems()->delete();
        });

        return redirect()->back()->with('success', 'Заказ успешно создан!');
    }
}
