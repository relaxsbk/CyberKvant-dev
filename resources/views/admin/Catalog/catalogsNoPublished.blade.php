@extends('layout.admin')

@section('adminMain')

    <x-breadcrumb>
        <li aria-current="page">
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10" aria-hidden="true">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-500">Каталоги</span>
            </div>
        </li>
    </x-breadcrumb>

    <h1 class="text-4xl mt-3 ">Список всех каталогов</h1>

    {{-- Modal create --}}
    <div x-data="{ showCreate: false }" class="mb-3">
        <div class="flex justify-end">
            <button @click="showCreate = true"
                    class="duration-300 focus:outline-none text-white bg-primary-purple hover:bg-dark-purple focus:ring-4 focus:ring-primary-purple rounded-lg px-5 py-2.5 ">
                + Добавить каталог
            </button>
        </div>

        <div x-show="showCreate"
             x-transition
             class="fixed inset-0 flex items-center justify-center z-50 bg-black/50 backdrop-blur-sm"
             style="display: none;">
            <div @click.away="showCreate = false"
                 class="bg-white dark:bg-[#1e1e1e] p-6 rounded-lg shadow-xl w-full max-w-lg overflow-y-auto max-h-[90vh]">
                <h2 class="text-xl mb-4">Создать новый каталог</h2>

                <form method="POST" action="" enctype="multipart/form-data" class="text-gray-400 text-sm">
                    @csrf

                    {{-- Название --}}
                    <div class="mb-4">
                        <label class="block mb-1 font-medium">Название</label>
                        <input name="title" type="text" value="{{ old('title') }}"
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
                    <div class="mb-4">
                        <label class="block mb-1 font-medium">Статус</label>
                        <select name="published"
                                class="w-full px-4 py-2 border border-none rounded-md dark:bg-[#464646]/50 dark:text-white duration-300 ease-in-out focus:ring-primary-purple">
                            <option value="0" class="bg-[#464646]" >Черновик</option>
                            <option value="1" class="bg-[#464646]" >Опубликован</option>
                        </select>
                    </div>

                    {{-- Загрузка изображения --}}
                    <div class="mb-6">
                        <label class="block mb-1 font-medium">Изображение</label>
                        <input type="file" name="image"
                               required
                               class="block w-full text-sm text-gray-900 border-none rounded-md dark:bg-[#464646]/50 dark:text-white duration-300 ease-in-out focus:ring-primary-purple">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Макс. размер: 2MB</p>
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
   @if($catalogs->isEmpty())
       <h2 class="text-3xl mt-12 mb-6 text-center">К сожалению каталогов нет...</h2>
   @else
       <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
           <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
               <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-[#464646] dark:text-gray-400">
               <tr>
                   <th scope="col" class="px-6 py-3">№</th>
                   <th scope="col" class="px-6 py-3">Картинка</th>
                   <th scope="col" class="px-6 py-3">Название</th>
                   <th scope="col" class="px-6 py-3">Описание</th>
                   <th scope="col" class="px-6 py-3">Статус</th>
                   <th scope="col" class="px-6 py-3">Дата создания</th>
                   <th scope="col" class="px-6 py-3">Действия</th>
               </tr>
               </thead>
               <tbody>
               @foreach($catalogs as $catalog)
                   <tr class="border-b border-gray-950 dark:bg-[#2B2D2D] hover:bg-gray-50 dark:hover:bg-[#2B2D2D]/50 duration-300">
                       <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                           {{ $catalog->id }}
                       </th>
                       <td class="px-6 py-4">
                           <img src="{{ asset($catalog->image) }}" alt="{{ $catalog->title }}" class="w-16 h-16 object-cover">
                       </td>
                       <td class="px-6 py-4">
                           {{ $catalog->title }}
                       </td>
                       <td class="px-6 py-4">
                           {{ $catalog->description }}
                       </td>
                       <td class="px-6 py-4">
                           {{ $catalog->published }}
                       </td>
                       <td class="px-6 py-4">
                           {{ $catalog->created_at->format('d.m.Y')}}
                       </td>
                       <td class="flex items-center px-6 py-4 gap-3">
                           <!-- Кнопка открытия модального окна редактирования -->
                           <button type="button"
                                   class="open-edit-modal duration-300 focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 rounded-lg px-3 py-2.5 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900"
                                   data-catalog-id="{{ $catalog->id }}"
                                   data-catalog-title="{{ $catalog->title }}"
                                   data-catalog-description="{{ $catalog->description }}"
                                   data-catalog-published="{{ $catalog->published }}">
                               <i class="w-5 h-5" data-lucide="pencil"></i>
                           </button>
                           <!-- Кнопка открытия модального окна удаления -->
                           <button type="button"
                                   class="open-delete-modal duration-300 focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 rounded-lg px-3 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                                   data-catalog-id="{{ $catalog->id }}">
                               <i class="w-5 h-5" data-lucide="trash-2"></i>
                           </button>
                       </td>
                   </tr>
               @endforeach
               </tbody>
           </table>

           <div class="mt-3">
               {{ $catalogs->links() }}
           </div>
       </div>
   @endif

    <!-- Модальное окно редактирования (одно для всей страницы) -->
    <div id="edit-modal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white dark:bg-[#464646] rounded-lg shadow-lg p-6 relative w-full max-w-2xl mx-4">
            <button class="absolute top-2 right-2 text-gray-400 hover:text-gray-600 text-2xl font-bold close-modal">&times;</button>
            <h3 class="text-xl font-semibold mb-4">Редактировать каталог</h3>
            <form id="edit-form" method="POST" action="" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="edit-title" class="block text-sm font-medium text-gray-900 dark:text-white">Картинка</label>
                    <input type="file" name="image" id="edit-image" class="w-full bg-[#2B2D2D] border border-none rounded focus:ring-primary-purple " required>
                </div>
                <div class="mb-4">
                    <label for="edit-title" class="block text-sm font-medium text-gray-900 dark:text-white">Название</label>
                    <input type="text" name="title" id="edit-title" class="w-full bg-[#2B2D2D] border border-none rounded p-2 focus:ring-primary-purple " required>
                </div>
                <div class="mb-4">
                    <label for="edit-description" class="block text-sm font-medium text-gray-900 dark:text-white">Описание</label>
                    <textarea name="description" id="edit-description" rows="15" class="w-full bg-[#2B2D2D] border border-none rounded p-2 focus:ring-primary-purple " required></textarea>
                </div>
                <div class="mb-4">
                    <label for="edit-published" class="block text-sm font-medium text-gray-900 dark:text-white">Статус</label>
                    <select name="published" id="edit-published" class="w-full bg-[#2B2D2D] border border-none rounded p-2 focus:ring-primary-purple ">
                        <option class="bg-[#2B2D2D] border border-none rounded p-2 focus:ring-primary-purple "  value="1">Опубликован</option>
                        <option class="bg-[#2B2D2D] border border-none rounded p-2 focus:ring-primary-purple " value="0">Не опубликован</option>
                    </select>
                </div>
                <div class="flex justify-end gap-2">
                    <button type="submit" class="px-4 py-2 bg-purple-700 text-white rounded hover:bg-purple-800 duration-300">Сохранить</button>
                    <button type="button" class="close-modal px-4 py-2 bg-gray-600 rounded hover:bg-gray-700 duration-300">Отмена</button>

                </div>
            </form>
        </div>
    </div>

    <!-- Модальное окно удаления (одно для всей страницы) -->
    <div id="delete-modal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white dark:bg-[#464646] rounded-lg shadow-lg p-6 relative w-full max-w-md mx-4">
            <button class="absolute top-2 right-2 text-gray-400 hover:text-gray-600 text-2xl font-bold close-modal">&times;</button>
            <h3 class="text-xl font-semibold mb-4">Вы действительно хотите удалить каталог?</h3>
            <form id="delete-form" method="POST" action="">
                @csrf
                @method('DELETE')
                <div class="flex justify-end gap-2">
                    <button type="submit" class="px-4 py-2 bg-red-700 text-white rounded hover:bg-red-800 duration-300">Да, удалить</button>
                    <button type="button" class="close-modal px-4 py-2 bg-gray-600 rounded hover:bg-gray-700 duration-300">Отмена</button>

                </div>
            </form>
        </div>
    </div>

    <!-- Скрипты для открытия/закрытия модальных окон -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Функции для открытия/закрытия модального окна через утилиты tailwind
            function openModal(modal) {
                modal.classList.remove('hidden');
            }
            function closeModal(modal) {
                modal.classList.add('hidden');
            }
            // Закрытие при клике на элементы с классом .close-modal
            document.querySelectorAll('.close-modal').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    closeModal(btn.closest('[id$="-modal"]'));
                });
            });
            // Закрытие при клике вне содержимого модалки
            document.querySelectorAll('[id$="-modal"]').forEach(function(modal) {
                modal.addEventListener('click', function(event) {
                    if (event.target === modal) {
                        closeModal(modal);
                    }
                });
            });
            // Обработчик кликов для кнопок редактирования
            document.querySelectorAll('.open-edit-modal').forEach(function(button) {
                button.addEventListener('click', function() {
                    const catalogId = this.getAttribute('data-catalog-id');
                    const title = this.getAttribute('data-catalog-title');
                    const description = this.getAttribute('data-catalog-description');
                    const published = this.getAttribute('data-catalog-published');
                    document.getElementById('edit-title').value = title;
                    document.getElementById('edit-description').value = description;
                    document.getElementById('edit-published').value = published;
                    document.getElementById('edit-form').action = '/catalogs/' + catalogId;
                    openModal(document.getElementById('edit-modal'));
                });
            });
            // Обработчик кликов для кнопок удаления
            document.querySelectorAll('.open-delete-modal').forEach(function(button) {
                button.addEventListener('click', function() {
                    const catalogId = this.getAttribute('data-catalog-id');
                    document.getElementById('delete-form').action = '/catalogs/' + catalogId;
                    openModal(document.getElementById('delete-modal'));
                });
            });
        });
    </script>

@endsection
