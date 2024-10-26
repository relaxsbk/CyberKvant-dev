<!DOCTYPE html>
<html>
<head lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    @inertiaHead
    @routes
</head>
<body class="bg-[#141414] text-white">
@inertia
</body>
</html>
