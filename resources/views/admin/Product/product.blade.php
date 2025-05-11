@extends('layout.admin')

@section('adminMain')
    <x-breadcrumb>
        <li>
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <a href="{{route('admin.products')}}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white duration-300">
                    Все товары
                </a>
            </div>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10" aria-hidden="true">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-500">{{$product->title}}</span>
            </div>
        </li>
    </x-breadcrumb>


    <div class="py-6 ">
        <h2 class="text-2xl font-semibold mb-6 text-gray-900 dark:text-gray-100">Просмотр товара: <span class="text-secondary-purple">{{ $product->title }}</span></h2>

        {{-- Информация о товаре --}}
        <form action="{{route('admin.products.update', $product)}}" method="POST" enctype="multipart/form-data" class="bg-white dark:bg-[#1E1E1E] shadow rounded-lg p-6 text-gray-900 dark:text-gray-100 space-y-5 mb-3">
            @csrf
            @method('PUT')

            {{-- Название --}}
            <div>
                <label for="title" class="block font-medium">Название</label>
                <input type="text" id="title" name="title" value="{{ old('title', $product->title) }}"
                       class="w-full mt-1 p-2 duration-300 ease-in-out focus:ring-primary-purple border border-none rounded dark:bg-[#464646]/50 dark:border-gray-600 dark:text-white">
            </div>

            {{-- Slug --}}
            <div>
                <label for="slug" class="block font-medium">Slug</label>
                <input type="text" disabled id="slug" name="slug" value="{{ old('slug', $product->slug) }}"
                       class="w-full mt-1 p-2 duration-300 ease-in-out focus:ring-primary-purple border border-none rounded dark:bg-[#464646] dark:border-gray-600 dark:text-gray-400 cursor-not-allowed">
            </div>

            {{-- Модель --}}
            <div>
                <label for="model" class="block font-medium">Модель</label>
                <input type="text" id="model" name="model" value="{{ old('model', $product->model) }}"
                       class="w-full mt-1 p-2 duration-300 ease-in-out focus:ring-primary-purple border border-none rounded dark:bg-[#464646]/50 dark:border-gray-600 dark:text-white">
            </div>

            {{-- Категория --}}
            <div>
                <label for="category_id" class="block font-medium">Категория</label>
                <select id="category_id" name="category_id"
                        class="w-full mt-1 p-2 duration-300 ease-in-out focus:ring-primary-purple border border-none rounded dark:bg-[#464646]/50 dark:border-gray-600 dark:text-white">
                    @foreach($categories as $category)
                        <option class="bg-[#464646]" value="{{ $category->id }}" {{ $product->category_id === $category->id ? 'selected' : '' }}>
                            {{ $category->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Бренд --}}
            <div>
                <label for="brand_id" class="block font-medium">Бренд</label>
                <select id="brand_id" name="brand_id"
                        class="w-full mt-1 p-2 duration-300 ease-in-out focus:ring-primary-purple border border-none rounded dark:bg-[#464646]/50 dark:border-gray-600 dark:text-white">
                    @foreach($brands as $brand)
                        <option class="bg-[#464646]" value="{{ $brand->id }}" {{ $product->brand_id === $brand->id ? 'selected' : '' }}>
                            {{ $brand->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Поставщик --}}
            <div>
                <label for="provider_id" class="block font-medium">Поставщик</label>
                <select id="provider_id" name="provider_id"
                        class="w-full mt-1 p-2 border border-none duration-300 ease-in-out focus:ring-primary-purple rounded dark:bg-[#464646]/50 dark:border-gray-600 dark:text-white">
                    @foreach($providers as $provider)
                        <option class="bg-[#464646]" value="{{ $provider->id }}" {{ $product->provider_id === $provider->id ? 'selected' : '' }}>
                            {{ $provider->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Цена --}}
            <div>
                <label for="price" class="block font-medium">Цена</label>
                <input type="number" step="1" id="price" name="price" value="{{ old('price', $product->price) }}"
                       class="w-full mt-1 p-2 duration-300 ease-in-out focus:ring-primary-purple border border-none rounded dark:bg-[#464646]/50 dark:border-gray-600 dark:text-white">
            </div>
            <div>
                <label for="discount" class="block font-medium">Скидка</label>
                <input type="number" step="5" id="discount" name="discount" value="{{ old('discount', $product->discount) }}"
                       class="w-full mt-1 p-2 duration-300 ease-in-out focus:ring-primary-purple border border-none rounded dark:bg-[#464646]/50 dark:border-gray-600 dark:text-white">
            </div>


            {{-- Количество --}}
            <div>
                <label for="quantity" class="block font-medium">Количество</label>
                <input type="number" id="quantity" name="quantity" value="{{ old('quantity', $product->quantity) }}"
                       class="w-full mt-1 p-2 duration-300 ease-in-out focus:ring-primary-purple border border-none rounded dark:bg-[#464646]/50 dark:border-gray-600 dark:text-white">
            </div>

            {{-- Описание --}}
            <div>
                <label for="description" class="block font-medium">Описание</label>
                <textarea id="description" name="description" rows="5"
                          class="w-full mt-1 p-2 duration-300 ease-in-out focus:ring-primary-purple border border-none rounded dark:bg-[#464646]/50 dark:border-gray-600 dark:text-white">{{ old('description', $product->description) }}</textarea>
            </div>

            {{-- Опубликован --}}
            <div class="flex items-center">
                <input type="checkbox" id="published" name="published" value="1"
                       {{ old('published', $product->published) ? 'checked' : '' }}
                       class="mr-2">
                <label for="published" class="font-medium">Опубликован</label>
            </div>

            {{-- Изображения --}}
            <div>
                <label for="images" class="block font-medium">Изображения</label>
                <input type="file" name="images[]" id="images" multiple
                       class="w-full mt-1 mb-3 p-2 duration-300 ease-in-out focus:ring-primary-purple border border-none rounded dark:bg-[#464646]/50  dark:text-white">
                <p class="text-sm mt-1">Текущие изображения:</p>
                @if($product->images->isEmpty())

                @else
                    <div class="flex items-center justify-start gap-3 mt-2">
                        @foreach ($product->images as $image)
                            <img src="{{ asset($image->url) }}" alt="Фото товара" class="rounded w-32 h-auto">
                        @endforeach
                    </div>
                @endif
            </div>

            {{-- Кнопки --}}
            <div class="flex justify-end pt-4">
                <button type="submit"
                        class="px-4 py-2 bg-primary-purple text-white rounded hover:bg-primary-purple">
                    Сохранить изменения
                </button>
            </div>
        </form>


        <h3 class="text-2xl font-semibold mb-6 text-gray-900 dark:text-gray-100 mt-3">Характеристики товара</h3>

        <form action="{{ route('admin.products.update-characteristics', $product->id) }}" method="POST" class="bg-white dark:bg-[#1E1E1E] shadow rounded-lg p-6 text-gray-900 dark:text-gray-100 space-y-5 mb-3">
            @csrf
            @method('PUT')

            @foreach ($categoryCharacteristics as $characteristic)
                <div class="mb-3">
                    <label class="form-label">{{ $characteristic->attribute_characteristic }}</label>
                    <input type="text" name="characteristics[{{ $characteristic->attribute_characteristic }}]"
                           value="{{ $productCharacteristics[$characteristic->attribute_characteristic] ?? '' }}"
                           class="w-full mt-1 p-2 duration-300 ease-in-out focus:ring-primary-purple border border-none rounded dark:bg-[#464646]/50 dark:border-gray-600 dark:text-white">
                </div>
            @endforeach

            <div class="flex justify-end">
                <button type="submit" class="px-4 py-2 rounded-md bg-primary-purple hover:bg-dark-purple duration-300 dark:text-white">Сохранить характеристики</button>
            </div>
        </form>
    </div>

    {{-- Кнопка удаления --}}
    <div class="flex justify-end">
        <div x-data="{ showDelete{{ $product->id }}: false }">
            <button @click="showDelete{{ $product->id }} = true"
                    class="duration-300 focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 rounded-lg px-3 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                Удалить
            </button>

            <div x-show="showDelete{{ $product->id }}"
                 x-transition
                 class="fixed inset-0 flex items-center justify-center z-50 bg-black/50 backdrop-blur-sm"
                 style="display: none;">
                <div @click.away="showDelete{{ $product->id }} = false"
                     class="bg-white dark:bg-[#1e1e1e] p-6 rounded-lg shadow-xl w-full max-w-md">
                    <h2 class="text-lg mb-4">Удалить товар"{{ $product->title }}"?</h2>
                    <p class="mb-6 text-sm text-gray-600 dark:text-gray-400">Это действие необратимо.</p>
                    <form method="POST" action="">
                        @csrf
                        @method('DELETE')
                        <div class="flex justify-end gap-2">
                            <button type="submit" class="px-4 py-2 bg-red-700 hover:bg-red-900 duration-300 text-white rounded-md">
                                Удалить
                            </button>
                            <button type="button" @click="showDelete{{ $product->id }} = false"
                                    class="px-4 py-2 rounded-md bg-gray-700 hover:bg-gray-500 duration-300 dark:text-white">
                                Отмена
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
