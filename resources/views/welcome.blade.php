@extends('layouts.welcome')

@section('content')
    <div class="flex-grow-1 d-flex align-items-center justify-content-center">
        <div class="text-center px-3">
            <div class="mb-4">
                <i class="fa-solid fa-folder-open text-primary" style="font-size: 3.5rem;"></i>
            </div>
            <h1 class="display-5 fw-bold mb-2">{{ config('app.name', 'Portfolio') }}</h1>
            <p class="text-secondary mb-4">Gestisci i tuoi progetti in modo semplice e professionale</p>
            <div class="d-flex justify-content-center gap-3">
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-primary px-4 shadow-sm">
                        <i class="fa-solid fa-gauge me-1"></i> Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary px-4 shadow-sm">
                        <i class="fa-solid fa-right-to-bracket me-1"></i> Accedi
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-outline-secondary px-4 shadow-sm">
                            <i class="fa-solid fa-user-plus me-1"></i> Registrati
                        </a>
                    @endif
                @endauth
            </div>
        </div>
    </div>
@endsection
