@extends('layout.admin')

@section('adminMain')

    <x-breadcrumb>
        <li aria-current="page">
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10" aria-hidden="true">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Каталоги</span>
            </div>
        </li>
    </x-breadcrumb>

    <h1 class="text-4xl mt-3 mb-6">Список всех каталогов</h1>

    @if($brands->isEmpty())
        <h2 class="text-3xl mt-12 mb-6">К сожалению каталогов нет...</h2>
    @else
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-[#464646] dark:text-gray-400">
                <tr>
                    <th class="px-6 py-3">№</th>
                    <th class="px-6 py-3">Картинка</th>
                    <th class="px-6 py-3">Название</th>
                    <th class="px-6 py-3">Описание</th>
                    <th class="px-6 py-3">Статус</th>
                    <th class="px-6 py-3">Дата создания</th>
                    <th class="px-6 py-3">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($brands as $brand)
                    <tr class="border-b border-gray-950 dark:bg-[#2B2D2D] hover:bg-gray-50 dark:hover:bg-[#2B2D2D]/50 duration-300">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $brand->id }}
                        </td>
                        <td class="px-6 py-4">
                            <img src="{{ asset($brand->image) }}" alt="{{ $brand->title }}" class="bg-white rounded-[10px] p-3 object-cover">
                        </td>
                        <td class="px-6 py-4">{{ $brand->title }}</td>
                        <td class="px-6 py-4">{{ $brand->description }}</td>
                        <td class="px-6 py-4">{{ $brand->published }}</td>
                        <td class="px-6 py-4">{{ $brand->created_at->format('d.m.Y') }}</td>
                        <td class="flex items-center px-6 py-4 gap-3">
                            {{-- Edit Modal --}}
                            <div x-data="{ showEdit{{ $brand->id }}: false }">
                                <button @click="showEdit{{ $brand->id }} = true"
                                        class="duration-300 focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 rounded-lg px-3 py-2.5 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
                                    <i class="w-5 h-5" data-lucide="pencil"></i>
                                </button>

                                <div x-show="showEdit{{ $brand->id }}"
                                     x-transition
                                     class="fixed inset-0 flex items-center justify-center z-50 bg-black/50 backdrop-blur-sm"
                                     style="display: none;">
                                    <div @click.away="showEdit{{ $brand->id }} = false"
                                         class="bg-white dark:bg-[#1e1e1e] p-6 rounded-lg shadow-xl w-full max-w-lg overflow-y-auto max-h-[90vh]">
                                        <h2 class="text-xl mb-4">Редактировать бренд {{ $brand->title }}</h2>

                                        <form method="POST" action="" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')

                                            {{-- Название --}}
                                            <div class="mb-4">
                                                <label class="block mb-1 font-medium">Название</label>
                                                <input name="title" type="text" value="{{ old('title', $brand->title) }}"
                                                       class="w-full px-4 py-2 border border-none rounded-md dark:bg-[#464646]/50 dark:text-white duration-300 ease-in-out focus:ring-primary-purple">
                                            </div>

                                            {{-- Описание --}}
                                            <div class="mb-4">
                                                <label class="block mb-1 font-medium">Описание</label>
                                                <textarea name="description" rows="9"
                                                          class="w-full px-4 py-2 border border-none rounded-md dark:bg-[#464646]/50 dark:text-white duration-300 ease-in-out focus:ring-primary-purple">{{ old('description', $brand->description) }}</textarea>
                                            </div>

                                            {{-- Статус публикации --}}
                                            <div class="mb-4">
                                                <label class="block mb-1 font-medium">Статус</label>
                                                <select name="published"
                                                        class="w-full px-4 py-2 border border-none rounded-md dark:bg-[#464646]/50 dark:text-white duration-300 ease-in-out focus:ring-primary-purple">
                                                    <option class="bg-[#464646] " value="0" @selected($brand->published === 0)>Черновик</option>
                                                    <option class="bg-[#464646] " value="1" @selected($brand->published === 1)>Опубликован</option>
                                                </select>
                                            </div>

                                            {{-- Текущее изображение --}}
                                            <div class="mb-4">
                                                <label class="block mb-1 font-medium">Текущее изображение</label>
                                                <img src="{{ asset($brand->image) }}"  alt="{{ $brand->title }}"
                                                     class=" object-cover bg-white w-32 p-3 rounded ">
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
                                                <button type="button" @click="showEdit{{ $brand->id }} = false"
                                                        class="px-4 py-2 rounded-md bg-gray-700 hover:bg-gray-500 duration-300 dark:text-white">
                                                    Отмена
                                                </button>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            {{-- Delete Modal --}}
                            <div x-data="{ showDelete{{ $brand->id }}: false }">
                                <button @click="showDelete{{ $brand->id }} = true"
                                        class="duration-300 focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 rounded-lg px-3 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                    <i class="w-5 h-5" data-lucide="trash-2"></i>
                                </button>

                                <div x-show="showDelete{{ $brand->id }}"
                                     x-transition
                                     class="fixed inset-0 flex items-center justify-center z-50 bg-black/50 backdrop-blur-sm"
                                     style="display: none;">
                                    <div @click.away="showDelete{{ $brand->id }} = false"
                                         class="bg-white dark:bg-[#1e1e1e] p-6 rounded-lg shadow-xl w-full max-w-md">
                                        <h2 class="text-lg mb-4">Удалить бренд "{{ $brand->title }}"?</h2>
                                        <p class="mb-6 text-sm text-gray-600 dark:text-gray-400">Это действие необратимо.</p>
                                        <form method="POST" action="">
                                            @csrf
                                            @method('DELETE')
                                            <div class="flex justify-end gap-2">
                                                <button type="submit" class="px-4 py-2 bg-red-700 hover:bg-red-900 duration-300 text-white rounded-md">
                                                    Удалить
                                                </button>
                                                <button type="button" @click="showDelete{{ $brand->id }} = false"
                                                        class="px-4 py-2  rounded-md bg-gray-700 hover:bg-gray-500 duration-300 dark:text-white">
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
                {{ $brands->links() }}
            </div>
        </div>
    @endif

@endsection
