@extends('layouts.projects')

@section('title', __("Edit Type"))

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 fw-bold mb-0 font-display">{{ __("Edit Type") }}</h1>
        <a href="{{ route('admin.types.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> {{ __("Back") }}
        </a>
    </div>

    <div class="card shadow-sm border-0 card-accent-left">
        <div class="card-body p-4">
            @include('admin.types.partials.form', [
                'action' => route('admin.types.update', $type->id),
                'method' => 'PUT',
                'submitLabel' => __('Update Type'),
                'cancelRoute' => route('admin.types.show', $type->id),
            ])
        </div>
    </div>
@endsection
