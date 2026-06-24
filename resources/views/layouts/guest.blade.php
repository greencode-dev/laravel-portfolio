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

        @vite(['resources/js/app.js'])
    </head>
    <body class="bg-body-tertiary">
        <div class="position-relative min-vh-100 d-flex flex-column justify-content-center align-items-center">
            <div class="position-absolute top-0 end-0 d-flex align-items-center gap-2 z-1 pe-3 pt-3">
                <x-theme-toggle />

                <div class="vr mx-1"></div>

                <x-language-switcher variant="btn" />
            </div>

            <div class="text-center mb-4">
                <a href="/">
                    <x-application-logo style="width: 5rem; height: 5rem; color: var(--bs-secondary-color);" />
                </a>
            </div>

            <div class="card shadow-sm" style="max-width: 28rem; width: 100%;">
                <div class="card-body p-4">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
