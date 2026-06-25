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
<body class="bg-admin d-flex flex-column">
    @include('layouts.partials.navbar')

    <main class="container flex-grow-1">
        <div class="py-4">
            @yield('content')
        </div>
    </main>

    <footer class="py-3 text-center small" style="color: var(--bs-secondary-color); border-top: 1px solid rgba(var(--bs-primary-rgb), 0.1);">
        &copy; {{ date('Y') }} {{ __(config('app.name')) }}.
        <a href="{{ url('palette-preview') }}" style="color: var(--bs-primary); text-decoration: none;">{{ __('Palette') }}</a>
    </footer>

    @stack('scripts')
</body>
</html>
