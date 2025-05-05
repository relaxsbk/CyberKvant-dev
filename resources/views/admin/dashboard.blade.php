@extends('layout.admin')
@section('title', 'Админ панель')

@section('adminMain')

    <h1 class="text-4xl mt-[-10px] mb-6">Административная панель</h1>

    <section class="flex flex-wrap justify-between gap-6">

        <div class="max-w-lg p-6   rounded-lg shadow-sm dark:bg-[#2B2D2D] ">
            <div class="flex gap-3 border-b border-gray-500">
                <i data-lucide="notebook" class="w-[32px] h-[32px] inline-block "></i>
                <a href="}">
                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Заказы</h5>
                </a>

            </div>

            <p class="mb-6 mt-4 font-normal text-gray-500 dark:text-gray-400">Управляйте всеми заказами в магазине. Просматривайте, меняйте статусы и смотрите чей это заказ</p>
            <a href="" class="mt-3 focus:outline-none text-white bg-primary-purple hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900 duration-300">
                Перейти к заказам
            </a>

        </div>
        <div class="max-w-lg p-6   rounded-lg shadow-sm dark:bg-[#2B2D2D] ">
            <div class="flex gap-3 border-b border-gray-500">
                <i data-lucide="book" class="w-[32px] h-[32px] inline-block "></i>
                <a href="}">
                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Каталоги</h5>
                </a>

            </div>

            <p class="mb-6 mt-4 font-normal text-gray-500 dark:text-gray-400">Управляйте всеми каталогами в магазине, добавляйте, редактируйте и удаляйте их.</p>
            <a href="" class="mt-3 focus:outline-none text-white bg-primary-purple hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900 duration-300">
                Перейти к каталогам
            </a>

        </div>
        <div class="max-w-lg p-6   rounded-lg shadow-sm dark:bg-[#2B2D2D] ">
            <div class="flex gap-3 border-b border-gray-500">
                <i data-lucide="layers" class="w-[32px] h-[32px] inline-block "></i>
                <a href="}">
                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Категории</h5>
                </a>

            </div>

            <p class="mb-6 mt-4 font-normal text-gray-500 dark:text-gray-400">Управляйте всеми категориями в магазине, добавляйте, редактируйте и удаляйте их.</p>
            <a href="" class="mt-3 focus:outline-none text-white bg-primary-purple hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900 duration-300">
                Перейти к категориям
            </a>

        </div>
        <div class="max-w-lg p-6   rounded-lg shadow-sm dark:bg-[#2B2D2D] ">
            <div class="flex gap-3 border-b border-gray-500">
                <i data-lucide="tag" class="w-[32px] h-[32px] inline-block "></i>
                <a href="}">
                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Бренды</h5>
                </a>

            </div>

            <p class="mb-6 mt-4 font-normal text-gray-500 dark:text-gray-400">Управляйте всеми брендами в магазине, добавляйте, редактируйте и удаляйте их.</p>
            <a href="" class="mt-3 focus:outline-none text-white bg-primary-purple hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900 duration-300">
                Перейти к брендам
            </a>

        </div>
        <div class="max-w-lg p-6   rounded-lg shadow-sm dark:bg-[#2B2D2D] ">
            <div class="flex gap-3 border-b border-gray-500">
                <i data-lucide="package" class="w-[32px] h-[32px] inline-block "></i>
                <a href="}">
                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Товары</h5>
                </a>

            </div>

            <p class="mb-6 mt-4 font-normal text-gray-500 dark:text-gray-400">Управляйте всеми товарами в магазине, добавляйте, редактируйте и удаляйте товары.</p>
            <a href="" class="mt-3 focus:outline-none text-white bg-primary-purple hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900 duration-300">
                Перейти к товарам
            </a>

        </div>
        <div class="max-w-lg p-6   rounded-lg shadow-sm dark:bg-[#2B2D2D] ">
            <div class="flex gap-3 border-b border-gray-500">
                <i data-lucide="users" class="w-[32px] h-[32px] inline-block "></i>
                <a href="}">
                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Пользователи</h5>
                </a>

            </div>

            <p class="mb-6 mt-4 font-normal text-gray-500 dark:text-gray-400">Управляйте всеми пользователями в магазине. Просматривайте пользователей и их заказы.</p>
            <a href="" class="mt-3 focus:outline-none text-white bg-primary-purple hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900 duration-300">
                Перейти к продуктам
            </a>

        </div>







    </section>

@endsection
