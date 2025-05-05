<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Order_status;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index()
    {
        $statuses = Order_status::all();
        $orders = Order::query()->paginate(15);

        return view('admin.Order.orders', compact('orders', 'statuses'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status_id' => 'required|exists:order_statuses,id',
        ]);

        $order->order_status_id = $request->status_id;
        $order->save();

        return redirect()->back()->with('success', 'Статус заказа обновлен.');
    }
}
