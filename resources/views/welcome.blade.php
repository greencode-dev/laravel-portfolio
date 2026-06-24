@extends('layouts.welcome')

@section('content')
<main class="flex-grow-1">
    {{-- Hero Section --}}
    <section class="hero-section position-relative overflow-hidden">
        <div class="hero-orbs">
            <div class="orb orb--1"></div>
            <div class="orb orb--2"></div>
            <div class="orb orb--3"></div>
        </div>

        <div class="floating-shapes">
            <div class="shape shape--1"></div>
            <div class="shape shape--2"></div>
            <div class="shape shape--3"></div>
        </div>

        <div class="container position-relative z-1">
            <div class="hero-content text-center py-5">
                <div class="hero-icon mb-4">
                    <i class="bi bi-folder2-open"></i>
                </div>
                <h1 class="display-3 fw-bold gradient-text font-display mb-3">{{ __(config('app.name')) }}</h1>
                <p class="text-secondary mb-4 fs-4 mx-auto" style="max-width: 600px;">
                    {{ __("Manage your projects easily and professionally") }}
                </p>

                @guest
                <div class="d-flex gap-3 justify-content-center flex-wrap">
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
        </div>
    </section>

    {{-- Feature Cards --}}
    <section class="py-5">
        <div class="container">
            <div class="row g-4 justify-content-center">
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="feature-card card h-100 text-center p-4">
                        <div class="feature-icon mb-3">
                            <i class="bi bi-folder-check fs-1"></i>
                        </div>
                        <h5 class="fw-bold font-display mb-2">{{ __("Project Management") }}</h5>
                        <p class="text-secondary mb-0">{{ __("Organize and track all your projects in one place") }}</p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="feature-card card h-100 text-center p-4">
                        <div class="feature-icon mb-3">
                            <i class="bi bi-tags fs-1"></i>
                        </div>
                        <h5 class="fw-bold font-display mb-2">{{ __("Project Types") }}</h5>
                        <p class="text-secondary mb-0">{{ __("Categorize projects by type: web, design, back-end and more") }}</p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="feature-card card h-100 text-center p-4">
                        <div class="feature-icon mb-3">
                            <i class="bi bi-palette fs-1"></i>
                        </div>
                        <h5 class="fw-bold font-display mb-2">{{ __("Modern Design") }}</h5>
                        <p class="text-secondary mb-0">{{ __("Clean interface with light and dark mode support") }}</p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="feature-card card h-100 text-center p-4">
                        <div class="feature-icon mb-3">
                            <i class="bi bi-translate fs-1"></i>
                        </div>
                        <h5 class="fw-bold font-display mb-2">{{ __("Multi-language") }}</h5>
                        <p class="text-secondary mb-0">{{ __("Available in English and Italian") }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
