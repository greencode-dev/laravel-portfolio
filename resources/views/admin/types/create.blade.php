@extends('layouts.projects')

@section('title', __("New Category"))

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 fw-bold mb-0 font-display">{{ __("New Category") }}</h1>
        <a href="{{ route('admin.types.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> {{ __("Back") }}
        </a>
    </div>

    <div class="card card-accent-left">
        <div class="card-body p-4">
            @include('admin.types.partials.form', [
                'submitLabel' => __('Create Category'),
                'submitIcon' => 'bi-plus-lg',
            ])
        </div>
    </div>
@endsection
