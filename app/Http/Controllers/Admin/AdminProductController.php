<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $providers = Provider::all();

        $products = Product::query()->paginate(10);

        return view('admin.Product.products', compact('products', 'categories', 'brands', 'providers'));
    }

    public function noPublished()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $providers = Provider::all();

        $products = Product::query()->where('published', false)->paginate(10);

        return view('admin.Product.productsNoPublished', compact('products', 'categories', 'brands', 'providers'));
    }


    public function store(Request $request)
    {

        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'provider_id' => 'required|exists:providers,id',
            'title' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'published' => 'nullable',
            'images.*' => 'nullable|image|max:2048', // 2MB per image
        ]);

        $product = Product::create([
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'provider_id' => $request->provider_id,
            'title' => $request->title,
            'model' => $request->model,
            'slug' => Str::slug($request->title),
            'price' => $request->price,
            'discount' => $request->discount,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'published' => $request->has('published'),
        ]);

        // Обработка изображений
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                if ($index >= 3) break; // максимум 3 изображения

                $path = $image->store('products', 'public');

                $product->images()->create([
                    'url' => "storage/$path",
                    'position' => $index,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Товар успешно создан');
    }



    public function show(Product $product)
    {

        $categories = Category::all();
        $brands = Brand::all();
        $providers = Provider::all();


        return view('admin.Product.product', compact('product', 'categories', 'brands', 'providers'));
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
