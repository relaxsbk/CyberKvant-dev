<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreCategoryRequest;
use App\Http\Requests\Admin\Category\UpdateCategoryRequest;
use App\Models\Catalog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $catalogs = Catalog::all();
        $categories = Category::query()->paginate(15);

        return view('admin.Category.categories', compact('categories', 'catalogs'));
    }

    public function noPublished()
    {
        $catalogs = Catalog::all();
        $categories = Category::query()->where('published', false)->paginate(15);

        return view('admin.Category.categoriesNoPublished', compact('categories', 'catalogs'));
    }

    public function show(Category $category)
    {
        return view('admin.Category.attribute', compact('category'));
    }
    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();

//        dd($validated);

        $validated['published'] = $request->has('published');

        // Генерация slug
        $validated['slug'] = Str::slug($validated['title']);

        // Проверка на уникальность и добавление суффикса при необходимости
        $originalSlug = $validated['slug'];
        $counter = 1;
        while (Category::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] = $originalSlug . '-' . $counter++;
        }

        if ($request->hasFile('image')) {
            $validated['image'] = "/storage/{$request->file('image')->store('category', 'public')}";
        }

        Category::create($validated);

        return redirect()->back()->with('success', 'Категория добавлена');
    }
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $validated = $request->validated();
        $validated['published'] = $request->has('published');

        // Обновление slug только если изменилось имя
        if ($category->title !== $validated['title']) {
            $validated['slug'] = Str::slug($validated['title']);
            $originalSlug = $validated['slug'];
            $counter = 1;

            while (
            Category::where('slug', $validated['slug'])
                ->where('id', '!=', $category->id)
                ->exists()
            ) {
                $validated['slug'] = $originalSlug . '-' . $counter++;
            }
        }

        if ($request->hasFile('image')) {
            if ($category->image && Storage::disk('public')->exists(str_replace('/storage/', '', $category->image))) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $category->image));
            }

            $path = $request->file('image')->store('category', 'public');
            $validated['image'] = "/storage/$path";
        }

        $category->update($validated);

        return redirect()->back()->with('success', 'Категория обновлена');
    }


    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->back()->with('success', 'Категория успешно удалена');
    }

    public function addAttribute(Category $category, Request $request)
    {
        //
    }
}
