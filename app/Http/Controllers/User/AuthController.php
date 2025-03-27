<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function auth(AuthRequest $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $remember = $request->input('remember');

        if (!Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
            return back()->with(['error'=> 'Ошибка авторизации']);
        }

        return to_route('home')->with(['success' => 'Успешный вход в свой аккаунт']);
    }



}
