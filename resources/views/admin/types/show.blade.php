@extends('layouts.projects')

@section('title', __('Type Details'))

@section('content')
    @include('admin.partials.session-alert')

    <div class="d-flex justify-content-between align-items-center mb-4 px-4">
        <h1 class="h3 fw-bold mb-0 font-display">{{ __("Type Details") }}</h1>
        <a href="{{ route('admin.types.index') }}" class="btn btn-outline-secondary shadow-sm">
            <i class="bi bi-arrow-left me-1"></i> {{ __("Back") }}
        </a>
    </div>

    <div class="card shadow-sm border-0 card-accent-left">
        <div class="card-body p-4">
            <div class="mb-4">
                <h4 class="fw-bold mb-1">{{ $type->name }}</h4>
                <div class="d-flex flex-wrap gap-3 small text-secondary mt-2">
                    <span><strong>{{ __("Slug:") }}</strong> <code>{{ $type->slug }}</code></span>
                    <span><strong>{{ __("Projects:") }}</strong> {{ $type->projects->count() }}</span>
                    <span><strong>{{ __("Created on:") }}</strong> {{ $type->created_at->format('d/m/Y H:i') }}</span>
                    <span><strong>{{ __("Updated on:") }}</strong> {{ $type->updated_at->format('d/m/Y H:i') }}</span>
                </div>
            </div>

            @if ($type->projects->isNotEmpty())
                <div class="mt-4">
                    <h5 class="text-secondary mb-3">{{ __("Projects with this type") }}</h5>
                    <div class="list-group list-group-flush">
                        @foreach ($type->projects as $project)
                            <a href="{{ route('admin.projects.show', $project->id) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                <span>{{ $project->title }}</span>
                                <small class="text-secondary">{{ $project->created_at->format('d/m/Y') }}</small>
                            </a>
                        @endforeach
                    </div>
                </div>
            @else
                <p class="text-secondary mt-3"><i class="bi bi-info-circle me-1"></i> {{ __("No projects with this type.") }}</p>
            @endif

            <hr class="my-4">

            <div class="d-flex justify-content-between align-items-center">
                <form action="{{ route('admin.types.destroy', $type->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger shadow-sm" onclick="return confirm('{{ __("Are you sure you want to delete this type?") }}')">
                        <i class="bi bi-trash me-1"></i> {{ __("Delete") }}
                    </button>
                </form>
                <a href="{{ route('admin.types.edit', $type->id) }}" class="btn btn-outline-warning shadow-sm">
                    <i class="bi bi-pencil-square me-1"></i> {{ __("Edit") }}
                </a>
            </div>
        </div>
    </div>
@endsection
