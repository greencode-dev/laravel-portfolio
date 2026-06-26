<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <script>
            (function() { document.documentElement.setAttribute('data-bs-theme', localStorage.getItem('theme') || 'light'); })();
        </script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ __(config('app.name')) }}</title>
        <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'><text y='14' font-size='14'>📁</text></svg>">

        @vite(['resources/js/app.js'])
    </head>
    <body style="background: linear-gradient(180deg, var(--bs-body-bg) 0%, rgba(var(--bs-primary-rgb), 0.04) 100%);">
        <div class="position-relative min-vh-100 d-flex flex-column justify-content-center align-items-center">
            <div class="position-absolute top-0 end-0 d-flex align-items-center gap-2 z-1 pe-3 pt-3">
                <x-theme-toggle />

                <div class="vr mx-1"></div>

                <x-language-switcher variant="btn" />
            </div>

            <div class="text-center mb-4">
                <a href="/" class="text-decoration-none">
                    <i class="bi bi-folder2-open" style="font-size: 3rem; color: var(--bs-primary);"></i>
                </a>
            </div>

            <div class="card auth-card shadow-sm" style="max-width: 28rem; width: 100%;">
                    @yield('content')
            </div>
        </div>
    </body>
</html>
