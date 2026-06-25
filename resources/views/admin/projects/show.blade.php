@extends('layouts.projects')

@section('title', __("Project Details"))

@section('content')
    @include('admin.partials.session-alert')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 fw-bold mb-0 font-display">{{ __("Project Details") }}</h1>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> {{ __("Back") }}
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-start mb-4">
                <div>
                    <h4 class="fw-bold mb-1">{{ $project->title }}</h4>
                    @include('admin.projects.partials.show-metadata')
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-outline-warning shadow-sm">
                        <i class="bi bi-pencil-square me-1"></i> {{ __("Edit") }}
                    </a>
                    <button type="button" class="btn btn-outline-danger shadow-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-project-name="{{ $project->title }}" data-action="{{ route('admin.projects.destroy', $project->id) }}">
                        <i class="bi bi-trash me-1"></i> {{ __("Delete") }}
                    </button>
                </div>
            </div>

            <div class="mt-3">
                <h5 class="text-secondary">{{ __("Description") }}</h5>
                <p>{{ $project->description ?: '—' }}</p>
            </div>

            @if ($project->technologies->isNotEmpty())
                <div class="mt-4">
                    <h5 class="text-secondary mb-2">{{ __("Technologies") }}</h5>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach ($project->technologies as $technology)
                            <span class="badge bg-secondary bg-opacity-10 text-secondary px-3 py-2">{{ $technology->name }}</span>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>

    @include('admin.projects.partials.delete-modal')
@endsection
