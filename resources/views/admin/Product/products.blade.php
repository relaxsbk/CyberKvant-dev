@extends('layout.admin')

@section('adminMain')

    <x-breadcrumb>
        <li aria-current="page">
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10" aria-hidden="true">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-500">Товары</span>
            </div>
        </li>
    </x-breadcrumb>

    <h1 class="text-4xl mt-3 ">Список всех товаров</h1>
    {{-- Modal create --}}
    <div x-data="{ showCreate: false }" class="mb-3">
        <div class="flex justify-end">
            <button @click="showCreate = true"
                    class="duration-300 focus:outline-none text-white bg-primary-purple hover:bg-dark-purple focus:ring-4 focus:ring-primary-purple rounded-lg px-5 py-2.5 ">
                + Добавить товар
            </button>
        </div>

        <div x-show="showCreate"
             x-transition
             class="fixed inset-0 flex items-center justify-center z-50 bg-black/50 backdrop-blur-sm"
             style="display: none;">
            <div @click.away="showCreate = false"
                 class="bg-white dark:bg-[#1e1e1e] p-6 rounded-lg shadow-xl w-full max-w-lg overflow-y-auto max-h-[90vh]">
                <h2 class="text-xl mb-4">Создать новый товар</h2>

                <form method="POST" action="{{route('admin.products.store')}}" enctype="multipart/form-data" class="text-gray-400 text-sm">
                    @csrf
                    <div class="mb-4">
                        <label class="block mb-1 font-medium">Список категорий</label>
                        <select name="category_id" id="" class="w-full px-4 py-2 border border-none rounded-md dark:bg-[#464646]/50 dark:text-white duration-300 ease-in-out focus:ring-primary-purple">
                             <option class="bg-[#464646]" value="">Выберите каталог</option>
                            @foreach($categories as $category)
                                <option class="bg-[#464646]" value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block mb-1 font-medium">Список брендов</label>
                        <select name="brand_id" id="" class="w-full px-4 py-2 border border-none rounded-md dark:bg-[#464646]/50 dark:text-white duration-300 ease-in-out focus:ring-primary-purple">
                            <option class="bg-[#464646]" value="">Выберите бренд</option>
                            @foreach($brands as $brand)
                                <option class="bg-[#464646]" value="{{$brand->id}}">{{$brand->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block mb-1 font-medium">Список поставщиков</label>
                        <select name="provider_id" id="" class="w-full px-4 py-2 border border-none rounded-md dark:bg-[#464646]/50 dark:text-white duration-300 ease-in-out focus:ring-primary-purple">
                            <option class="bg-[#464646]" value="">Выберите поставщика</option>
                            @foreach($providers as $provider)
                                <option class="bg-[#464646]" value="{{$provider->id}}">{{$provider->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- Название --}}
                    <div class="mb-4">
                        <label class="block mb-1 font-medium">Название</label>
                        <input name="title" type="text" value="{{ old('title')}}"
                               class="w-full px-4 py-2 border border-none rounded-md dark:bg-[#464646]/50 dark:text-white duration-300 ease-in-out focus:ring-primary-purple">
                    </div>
                    <div class="mb-4">
                        <label class="block mb-1 font-medium">Цена</label>
                        <input name="price" type="number"  step="1" value="{{ old('price') }}"
                               class="w-full px-4 py-2 border border-none rounded-md dark:bg-[#464646]/50 dark:text-white duration-300 ease-in-out focus:ring-primary-purple"
                               required>
                    </div>
                    <div class="mb-4">
                        <label class="block mb-1 font-medium">Скидка</label>
                        <input name="discount" type="number" step="5" value="{{ old('discount') }}"
                               class="w-full px-4 py-2 border border-none rounded-md dark:bg-[#464646]/50 dark:text-white duration-300 ease-in-out focus:ring-primary-purple"
                               required>
                    </div>
                    <div class="mb-4">
                        <label class="block mb-1 font-medium">Количество</label>
                        <input name="quantity" type="number" min="0" step="1" value="{{ old('quantity') }}"
                               class="w-full px-4 py-2 border border-none rounded-md dark:bg-[#464646]/50 dark:text-white duration-300 ease-in-out focus:ring-primary-purple"
                               required>
                    </div>

                    {{-- Описание --}}
                    <div class="mb-4">
                        <label class="block mb-1 font-medium">Описание</label>
                        <textarea name="description" rows="9"
                                  class="w-full px-4 py-2 border border-none rounded-md dark:bg-[#464646]/50 dark:text-white duration-300 ease-in-out focus:ring-primary-purple">{{ old('description') }}</textarea>
                    </div>

                    {{-- Статус публикации --}}
                    <div class="mb-4 flex gap-3 items-center">
                       <input type="checkbox" name="published" class="focus:ring-primary-purple"> <label class="block font-medium">Опубликовать</label>
                    </div>

                    {{-- Загрузка изображения --}}
                    <div class="mb-6">
                        <label class="block mb-1 font-medium">Изображения (макс. 3)</label>
                        <input type="file" name="images[]" multiple accept="image/*"
                               class="block w-full text-sm text-gray-900 border-none rounded-md dark:bg-[#464646]/50 dark:text-white duration-300 ease-in-out focus:ring-primary-purple">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Макс. 3 изображения, каждое до 2MB</p>
                    </div>

                    {{-- Кнопки --}}
                    <div class="flex justify-end gap-2">
                        <button type="submit"
                                class="px-4 py-2 bg-primary-purple text-white rounded-md hover:bg-dark-purple duration-300">
                            Создать
                        </button>
                        <button type="button" @click="showCreate = false"
                                class="px-4 py-2 rounded-md bg-gray-700 hover:bg-gray-500 duration-300 dark:text-white">
                            Отмена
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if($products->isEmpty())
        <h2 class="text-3xl mt-12 mb-6 text-center">К сожалению категорий нет...</h2>
    @else
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-[#464646] dark:text-gray-400">
                <tr>
                    <th class="px-6 py-3">№</th>
                    <th class="px-6 py-3">Картинка</th>
                    <th class="px-6 py-3">Категория</th>
                    <th class="px-6 py-3">Бренд</th>
                    <th class="px-6 py-3">Название</th>
                    <th class="px-6 py-3">Цена</th>
                    <th class="px-6 py-3">Скидка</th>
                    <th class="px-6 py-3">Количество</th>
                    <th class="px-6 py-3">Статус</th>
                    <th class="px-6 py-3">Дата создания</th>
                    <th class="px-6 py-3">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr class="border-b border-gray-950 dark:bg-[#2B2D2D] hover:bg-gray-50 dark:hover:bg-[#2B2D2D]/50 duration-300">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $product->id }}
                        </td>
                        @if($product->images->isEmpty())
                            <td class="px-6 py-4">
                                Пусто
                            </td>
                        @else
                            <td class="px-6 py-4">
                                <img src="{{ asset($product->mainImage()->url) }}" alt="{{ $product->title }}" class="w-16  object-cover">
                            </td>
                        @endif
                        <td class="px-6 py-4">{{ $product->category->title }}</td>
                        <td class="px-6 py-4">{{ $product->brand->title }}</td>
                        <td class="px-6 py-4">{{ $product->title }}</td>
                        <td class="px-6 py-4">{{ $product->money() }} P</td>
                        <td class="px-6 py-4">{{ $product->discount }}</td>
                        <td class="px-6 py-4">{{ $product->quantity }}</td>
                        <td class="px-6 py-4">{{ $product->published }}</td>
                        <td class="px-6 py-4">{{ $product->created_at->format('d.m.Y') }}</td>
                        <td class="flex items-center px-6 py-4 gap-3">
                            {{-- Edit Modal --}}
                            <a href="{{route('admin.products.show', $product)}}"
                                    class="duration-300 focus:outline-none text-white bg-secondary-purple hover:bg-white focus:ring-4 focus:ring-purple-300 rounded-lg px-3 py-2.5 dark:bg-secondary-purple dark:hover:bg-primary-purple dark:focus:ring-purple-900">
                                <i class="w-5 h-5" data-lucide="eye"></i>
                            </a>
                            <div x-data="{ showEdit{{ $product->id }}: false }">
                                <button @click="showEdit{{ $product->id }} = true"
                                        class="duration-300 focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 rounded-lg px-3 py-2.5 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
                                    <i class="w-5 h-5" data-lucide="pencil"></i>
                                </button>

                                <div x-show="showEdit{{ $product->id }}"
                                     x-transition
                                     class="fixed inset-0 flex items-center justify-center z-50 bg-black/50 backdrop-blur-sm"
                                     style="display: none;">
                                    <div @click.away="showEdit{{ $product->id }} = false"
                                         class="bg-white dark:bg-[#1e1e1e] p-6 rounded-lg shadow-xl w-full max-w-lg overflow-y-auto max-h-[90vh]">
                                        <h2 class="text-xl mb-4">Редактировать #{{ $product->id }}</h2>

                                        <form method="POST" action="{{ route('admin.catalogs.update', $product) }}" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')

                                            {{-- Название --}}
                                            <div class="mb-4">
                                                <label class="block mb-1 font-medium">Список категорий</label>
                                                <select name="catalog" id="" class="w-full px-4 py-2 border border-none rounded-md dark:bg-[#464646]/50 dark:text-white duration-300 ease-in-out focus:ring-primary-purple">
                                                    @foreach($categories as $category)
                                                        <option class="bg-[#464646]" value="{{$category->id}}" {{ $category->id == $category->catalog_id ? 'selected' : '' }}>{{$category->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-4">
                                                <label class="block mb-1 font-medium">Список брендов</label>
                                                <select name="catalog" id="" class="w-full px-4 py-2 border border-none rounded-md dark:bg-[#464646]/50 dark:text-white duration-300 ease-in-out focus:ring-primary-purple">
                                                    @foreach($brands as $brand)
                                                        <option class="bg-[#464646]" value="{{$brand->id}}" {{ $brand->id == $brand->brand_id ? 'selected' : '' }}>{{$brand->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-4">
                                                <label class="block mb-1 font-medium">Список брендов</label>
                                                <select name="catalog" id="" class="w-full px-4 py-2 border border-none rounded-md dark:bg-[#464646]/50 dark:text-white duration-300 ease-in-out focus:ring-primary-purple">
                                                    @foreach($providers as $provider)
                                                        <option class="bg-[#464646]" value="{{$provider->id}}" {{ $provider->id == $provider->provider_id ? 'selected' : '' }}>{{$provider->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-4">
                                                <label class="block mb-1 font-medium">Название</label>
                                                <input name="title" type="text" value="{{ old('title', $product->title) }}"
                                                       class="w-full px-4 py-2 border border-none rounded-md dark:bg-[#464646]/50 dark:text-white duration-300 ease-in-out focus:ring-primary-purple">
                                            </div>
                                            <div class="mb-4">
                                                <label class="block mb-1 font-medium">Цена</label>
                                                <input name="price" type="number" value="{{ old('price', $product->price) }}"
                                                       class="w-full px-4 py-2 border border-none rounded-md dark:bg-[#464646]/50 dark:text-white duration-300 ease-in-out focus:ring-primary-purple">
                                            </div>
                                            <div class="mb-4">
                                                <label class="block mb-1 font-medium">Скидка</label>
                                                <input name="discount" type="number" value="{{ old('discount', $product->discount) }}"
                                                       class="w-full px-4 py-2 border border-none rounded-md dark:bg-[#464646]/50 dark:text-white duration-300 ease-in-out focus:ring-primary-purple">
                                            </div>
                                            <div class="mb-4">
                                                <label class="block mb-1 font-medium">Количество</label>
                                                <input name="quantity" type="number" value="{{ old('quantity', $product->quantity) }}"
                                                       class="w-full px-4 py-2 border border-none rounded-md dark:bg-[#464646]/50 dark:text-white duration-300 ease-in-out focus:ring-primary-purple">
                                            </div>

                                            {{-- Описание --}}
                                            <div class="mb-4">
                                                <label class="block mb-1 font-medium">Описание</label>
                                                <textarea name="description" rows="9"
                                                          class="w-full px-4 py-2 border border-none rounded-md dark:bg-[#464646]/50 dark:text-white duration-300 ease-in-out focus:ring-primary-purple">{{ old('description', $product->description) }}</textarea>
                                            </div>

                                            {{-- Статус публикации --}}
                                            <div class="mb-4">
                                                <label class="block mb-1 font-medium">Статус</label>
                                                <select name="published"
                                                        class="w-full px-4 py-2 border border-none rounded-md dark:bg-[#464646]/50 dark:text-white duration-300 ease-in-out focus:ring-primary-purple">
                                                    <option value="0" class="bg-[#464646]" @selected($product->published === 0)>Черновик</option>
                                                    <option value="1" class="bg-[#464646]" @selected($product->published === 1)>Опубликован</option>
                                                </select>
                                            </div>

                                            {{-- Текущее изображение --}}
                                            <div class="mb-4">
                                             @if($product->images->isEmpty())
                                                 Нет изображения
                                             @else
                                                    <label class="block mb-1 font-medium">Текущее изображение</label>
                                                    <img src="{{ asset($product->mainImage()->url) }}" alt="{{ $product->title }}"
                                                         class="w-32 object-cover rounded ">
                                             @endif
                                            </div>

                                            {{-- Загрузка нового изображения --}}
                                            <div class="mb-6">
                                                <label class="block mb-1 font-medium">Новое изображение</label>
                                                <input type="file" name="image"
                                                       class="block w-full text-sm text-gray-900 border border-none rounded-md dark:bg-[#464646]/50 dark:text-white duration-300 ease-in-out focus:ring-primary-purple">
                                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Макс. размер: 2MB</p>
                                            </div>

                                            <div class="flex justify-end gap-2">
                                                <button type="submit"
                                                        class="px-4 py-2 bg-primary-purple text-white rounded-md hover:bg-dark-purple duration-300">
                                                    Сохранить
                                                </button>
                                                <button type="button" @click="showEdit{{ $product->id }} = false"
                                                        class="px-4 py-2 rounded-md bg-gray-700 hover:bg-gray-500 duration-300 dark:text-white">
                                                    Отмена
                                                </button>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            {{-- Delete Modal --}}
                            <div x-data="{ showDelete{{ $product->id }}: false }">
                                <button @click="showDelete{{ $product->id }} = true"
                                        class="duration-300 focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 rounded-lg px-3 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                    <i class="w-5 h-5" data-lucide="trash-2"></i>
                                </button>

                                <div x-show="showDelete{{ $product->id }}"
                                     x-transition
                                     class="fixed inset-0 flex items-center justify-center z-50 bg-black/50 backdrop-blur-sm"
                                     style="display: none;">
                                    <div @click.away="showDelete{{ $product->id }} = false"
                                         class="bg-white dark:bg-[#1e1e1e] p-6 rounded-lg shadow-xl w-full max-w-md">
                                        <h2 class="text-lg mb-4">Удалить товар"{{ $product->title }}"?</h2>
                                        <p class="mb-6 text-sm text-gray-600 dark:text-gray-400">Это действие необратимо.</p>
                                        <form method="POST" action="{{ route('admin.catalogs.destroy', $product) }}">
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
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="mt-3">
                {{ $products->links() }}
            </div>
        </div>
    @endif

@endsection
