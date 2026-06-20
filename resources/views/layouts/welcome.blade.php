<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Portfolio') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite('resources/js/app.js')
</head>
<body class="bg-body d-flex flex-column min-vh-100">
    <div class="container py-3">
        <div class="d-flex justify-content-end align-items-center gap-2">
            <span class="small fw-semibold user-select-none" id="themeLabel" style="cursor: pointer; color: var(--bs-secondary-color);">Light Mode</span>
            <button class="theme-toggle-adaptive" id="themeToggle" title="Toggle tema" type="button">
                <i class="fa-solid fa-toggle-off" id="themeIcon"></i>
            </button>
        </div>
    </div>

    @yield('content')

    <footer class="py-3 text-center small" style="color: var(--bs-secondary-color);">
        &copy; {{ date('Y') }} {{ config('app.name', 'Portfolio') }}. Tutti i diritti riservati.
    </footer>
</body>
</html>
