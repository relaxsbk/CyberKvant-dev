<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BasketController extends Controller
{
    function index()
    {
        return Inertia::render('Basket', []);
    }
}
