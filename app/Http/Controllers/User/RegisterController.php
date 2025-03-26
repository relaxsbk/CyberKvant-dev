<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RegisterController extends Controller
{
    public function index()
    {
        return Inertia::render('User/Register');
    }

    public function store(RegisterRequest $request)
    {
       $user = User::query()->create($request->validated());

//       event(new Registered($user));

        return redirect()->route('home')->with(['success' => 'Успешная регистрация']);
    }
}
