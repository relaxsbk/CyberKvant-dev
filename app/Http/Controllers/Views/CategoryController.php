<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Models\Category;


class CategoryController extends Controller
{
    public function index()
    {

    }
    public function show(Category $category)
    {


        $category = Category::query()
            ->where('slug', $category->slug)
            ->where('published', true)
            ->firstOrFail();


        $allBrands = $category->products()
            ->with('brand:id,title')
            ->where('published', true)
            ->get()
            ->pluck('brand.title')
            ->unique()
            ->filter();

        $productsQuery = $category->products()
            ->with(['category:id,title,slug', 'reviews', 'brand:id,title'])
            ->where('published', true);

        // Применяем фильтры
        if ($brands = request('brands')) {
            $productsQuery->whereHas('brand', function ($query) use ($brands) {
                $query->whereIn('title', $brands);
            });
        }

        if ($priceMin = request('price_min')) {
            $productsQuery->where('price', '>=', $priceMin);
        }

        if ($priceMax = request('price_max')) {
            $productsQuery->where('price', '<=', $priceMax);
        }

        $priceRange = [
            'min' => $category->products()->where('published', true)->min('price'),
            'max' => $category->products()->where('published', true)->max('price'),
        ];

        $products = $productsQuery->paginate(8);

        $cartProductIds = auth()->check()
            ? auth()->user()->cartItems()->pluck('product_id')->toArray()
            : [];
        $cartFavoriteIds = auth()->check()
            ? auth()->user()->favoriteItems()->pluck('product_id')->toArray()
            : [];
        $cartCompareIds = auth()->check()
            ? auth()->user()->compareItems()->pluck('product_id')->toArray()
            : [];

        return inertia('Category_Products', [
            'category' => $category,
            'catalog' => $category->catalog,
            'cartProductIds' => $cartProductIds,
            'favoriteProductIds' => $cartFavoriteIds,
            'compareProductIds' => $cartCompareIds,
            'products' => $products->through(function ($product) {
                return [
                    'id' => $product->id,
                    'category' => $product->category,
                    'slug' => $product->slug,
                    'title' => $product->title,
                    'description' => $product->description,
                    'price' => $product->money(),
                    'rating' => $product->rating,
                    'reviewsCount' => $product->reviews->count(),
                    'brand' => $product->brand ? $product->brand->title : null,
                    'mainImage'=> $product->mainImage()->url,
                ];
            }),
            'filters' => [
                'brands' => $allBrands->values(), // Полный список брендов
                'priceRange' => $priceRange,
                'appliedFilters' => request()->only(['brands', 'price_min', 'price_max']),
            ],
        ]);
    }




}
