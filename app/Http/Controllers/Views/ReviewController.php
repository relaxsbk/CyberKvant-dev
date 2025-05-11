<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(ReviewRequest $request, Product $product)
    {

        $validated = $request->validated();
        $validated['product_id'] = $product->id;
//        Review::query()->create($validated);

        $request->user()->reviews()->create($validated);

//        $product = Product::findOrFail($request->product_id);
        $averageRating = $product->reviews()->avg('rating');
        $product->rating = $averageRating;
        $product->save();

        return redirect()->back()->with(['success' => 'Отзыв создан']);
    }
}
