<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <script>
        (function() { document.documentElement.setAttribute('data-bs-theme', localStorage.getItem('theme') || 'light'); })();
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="{{ __(config('app.name')) }} — {{ __("Manage your projects easily and professionally") }}">
    <title>@yield('title') — {{ __(config('app.name')) }}</title>

    @vite('resources/js/app.js')
</head>
<body>
    @include('layouts.partials.navbar')

    <main class="container">
        <div class="py-4">
            @yield('content')
        </div>
    </main>
</body>
</html>
