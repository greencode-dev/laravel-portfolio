@extends('layouts.welcome')

@section('content')
<main class="container d-flex flex-column justify-content-center align-items-center flex-grow-1 text-center py-5">
    <div class="hero-section">
        <h1 class="display-5 fw-bold mb-3">{{ __(config('app.name')) }}</h1>
        <p class="text-secondary mb-4 fs-5">{{ __("Manage your projects easily and professionally") }}</p>

        @guest
        <div class="d-flex gap-3 justify-content-center">
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg px-4 shadow-sm">
                <i class="bi bi-box-arrow-in-right me-1"></i> {{ __("Log in") }}
            </a>
            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg px-4">
                <i class="bi bi-person-plus me-1"></i> {{ __("Register") }}
            </a>
            @endif
        </div>
        @else
        <div class="d-flex gap-3 justify-content-center">
            <a href="{{ route('admin.projects.index') }}" class="btn btn-primary btn-lg px-4 shadow-sm">
                <i class="bi bi-folder2-open me-1"></i> {{ __("Projects") }}
            </a>
        </div>
        @endguest
    </div>
</main>
@endsection
