@extends('layouts.projects')

@section('title', __("New Technology"))

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 fw-bold mb-0 font-display">{{ __("New Technology") }}</h1>
        <a href="{{ route('admin.technologies.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> {{ __("Back") }}
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            @include('admin.technologies.partials.form', [
                'submitLabel' => __('Create Technology'),
                'submitIcon' => 'bi-plus-lg',
            ])
        </div>
    </div>
@endsection
