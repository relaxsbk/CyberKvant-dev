<!DOCTYPE html>
<html class="dark">
<head lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    @vite(['resources/css/app.css', 'resources/js/admin.js'])
    <title>@yield('title')</title>
</head>
<body class="bg-[#141414] text-white flex flex-col min-h-screen">


<div class="flex flex-1">
    <x-header-admin/>

    <x-sidebar />

    <main class="flex-1 p-6 mt-12 overflow-auto sm:ml-64">
        @if (session('success'))
            <div id="toast-default" class="fixed z-50 flex items-center w-full max-w-xs p-4 space-x-4 text-gray-500 divide-x rtl:divide-x-reverse rounded-lg shadow-sm right-5 bottom-5 dark:text-gray-400 divide-[#292929] bg-[#292929]" role="alert">
                <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 rounded-lg dark:bg-dark-purple dark:text-white-purple">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="ms-3 text-sm font-normal">{{ session('success') }}</div>
                <button type="button" data-dismiss-target="#toast-default" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-[#1E1E1E] dark:hover:bg-gray-700">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>

        @endif

        @if (session('errors'))
                Ошибка при заполнении формы
        @endif

        @yield('adminMain')
    </main>
</div>

<script src="//unpkg.com/alpinejs" defer></script>
<script src="https://unpkg.com/lucide@latest"></script>
<script>
    lucide.createIcons(); // Инициализация
</script>
</body>
</html>
