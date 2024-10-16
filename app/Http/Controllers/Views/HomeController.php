<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class HomeController extends Controller
{

    public function __invoke()
    {
        return Inertia::render('Home');
    }

}
