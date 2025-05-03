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
