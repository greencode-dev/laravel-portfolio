@extends('layouts.projects')

@section('title', __("Project Details"))

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 fw-bold mb-0">{{ __("Project Details") }}</h1>
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
                    <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning shadow-sm">
                        <i class="bi bi-pencil-square me-1"></i> {{ __("Edit") }}
                    </a>
                    <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger shadow-sm" onclick="return confirm('{{ __("Are you sure you want to delete this project?") }}')">
                            <i class="bi bi-trash me-1"></i> {{ __("Delete") }}
                        </button>
                    </form>
                </div>
            </div>

            <div class="mt-3">
                <h5 class="text-secondary">{{ __("Description") }}</h5>
                <p>{{ $project->description ?: '—' }}</p>
            </div>
        </div>
    </div>
@endsection
