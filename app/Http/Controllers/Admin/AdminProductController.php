<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Category_characteristic;
use App\Models\Product;
use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        $categoryCharacteristics = Category_characteristic::where('category_id', $product->category_id)->get();
        $characteristicModel = $product->characteristic;
        $productCharacteristics = $characteristicModel ? json_decode($characteristicModel->characteristic, true) : [];

        return view('admin.Product.product', compact('product', 'categories', 'brands', 'providers', 'categoryCharacteristics', 'productCharacteristics'));
    }

    public function updateCharacteristics(Request $request, Product $product)
    {
        $data = $request->input('characteristics', []);

        // Преобразование и сохранение
        $product->characteristic()->updateOrCreate(
            ['product_id' => $product->id],
            ['characteristic' => json_encode($data)]
        );

        return redirect()->back()->with('success', 'Характеристики обновлены.');
    }

    public function update(UpdateProductRequest $request, Product $product)
    {

        $validated = $request->validated();
        $validated['published'] = $request->has('published');

        // Обновление slug только если изменилось имя
        if ($product->title !== $validated['title']) {
            $validated['slug'] = Str::slug($validated['title']);
            $originalSlug = $validated['slug'];
            $counter = 1;

            while (
            Product::where('slug', $validated['slug'])
                ->where('id', '!=', $product->id)
                ->exists()
            ) {
                $validated['slug'] = $originalSlug . '-' . $counter++;
            }
        }


        // Обновляем базовые поля
        $product->update($validated);

        // Работа с изображениями
        if ($request->hasFile('new_images')) {
            foreach ($request->file('new_images') as $position => $image) {
                if (!$image) continue; // Пропускаем если файл не выбран

                $path = $image->store('products', 'public');

                // Ищем изображение с такой позицией
                $existingImage = $product->images()->where('position', $position)->first();

                if ($existingImage) {
                    // Удаляем старый файл, если он есть
                    if (Storage::disk('public')->exists(str_replace('/storage/', '', $existingImage->url))) {
                        Storage::disk('public')->delete(str_replace('/storage/', '', $existingImage->url));
                    }

                    // Обновляем ссылку
                    $existingImage->update([
                        'url' => '/storage/' . $path,
                    ]);
                } else {
                    // Создаем новое изображение
                    $product->images()->create([
                        'url' => '/storage/' . $path,
                        'position' => $position,
                    ]);
                }
            }
        }

        return redirect()->back()->with('success', 'Товар обновлен');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.products')->with('success', 'Успешное удаление товара');
    }
}
