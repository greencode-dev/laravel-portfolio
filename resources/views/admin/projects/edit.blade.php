@extends('layouts.projects')

@section('title', __("Edit Project"))

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 fw-bold mb-0">{{ __("Edit Project") }}</h1>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> {{ __("Back") }}
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            @include('admin.projects.partials.form', [
                'submitLabel' => __('Update Project'),
            ])
        </div>
    </div>
@endsection
