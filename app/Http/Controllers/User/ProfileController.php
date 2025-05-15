<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ProfileController extends Controller
{
    public function index()
    {
        $orders = Order::with(['items.product.mainImageOr', 'orderStatus']) // подгружаем товары заказа
            ->where('user_id', Auth::id())
            ->orderByDesc('created_at')
            ->get();

        return Inertia::render('User/Profile', [
            'orders' => $orders
        ]);
    }

    public function update(UpdateUserRequest $request)
    {
        Auth::user()->update($request->validated());

        return back()->with(['success' => 'Успешные изменения профиля']);
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return to_route('home')->with(['success' => 'Вы успешно вышли из аккаунта !']);
    }
}
