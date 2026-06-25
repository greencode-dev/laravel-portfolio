@extends('layouts.projects')

@section('title', __("Edit Technology"))

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 fw-bold mb-0 font-display">{{ __("Edit Technology") }}</h1>
        <a href="{{ route('admin.technologies.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> {{ __("Back") }}
        </a>
    </div>

    <div class="card shadow-sm border-0 card-accent-left">
        <div class="card-body p-4">
            @include('admin.technologies.partials.form', [
                'action' => route('admin.technologies.update', $technology->id),
                'method' => 'PUT',
                'submitLabel' => __('Update Technology'),
                'cancelRoute' => route('admin.technologies.show', $technology->id),
            ])
        </div>
    </div>
@endsection
