@extends('layouts.projects')

@section('title', __("Project Details"))

@section('content')
    @include('admin.partials.session-alert')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 fw-bold mb-0 font-display">{{ __("Project Details") }}</h1>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary shadow-sm">
            <i class="bi bi-arrow-left me-1"></i> {{ __("Back") }}
        </a>
    </div>

    <div class="card card-accent-left">
        <div class="card-body p-4">
            {{-- Timestamps --}}
            <div class="small text-secondary text-end mb-3">
                <div><i class="bi bi-calendar3 me-1"></i> {{ $project->created_at->format('d/m/Y H:i') }}</div>
                <div><i class="bi bi-arrow-clockwise me-1"></i> {{ $project->updated_at->format('d/m/Y H:i') }}</div>
            </div>

            {{-- Title --}}
            <h2 class="fw-bold font-display mb-3">{{ $project->title }}</h2>

            {{-- Type + Technologies --}}
            <div class="row mb-4">
                @if ($project->type)
                    @php
                        $tColor = $project->type->color ?? '#6366f1';
                        $tRgb = implode(', ', sscanf($tColor, '#%02x%02x%02x') ?: [99, 102, 241]);
                    @endphp
                    <div class="col-12 col-md-auto mb-2 mb-md-0">
                        <h5 class="text-secondary mb-2"><i class="bi bi-tag me-1"></i> {{ __("Category") }}</h5>
                        <span class="badge-tech" style="color: {{ $tColor }}; background: rgba({{ $tRgb }}, 0.12);">
                            {{ $project->type->name }}
                        </span>
                    </div>
                @endif

                @if ($project->technologies->isNotEmpty())
                    <div class="col">
                        <h5 class="text-secondary mb-2"><i class="bi bi-code-slash me-1"></i> {{ __("Technologies") }}</h5>
                        <div class="d-flex flex-wrap gap-2">
                            @foreach ($project->technologies as $technology)
                                @php
                                    $techColor = $technology->color ?? '#6366f1';
                                    $techRgb = implode(', ', sscanf($techColor, '#%02x%02x%02x') ?: [99, 102, 241]);
                                @endphp
                                <span class="badge-tech" style="color: {{ $techColor }}; border: 1px solid rgba({{ $techRgb }}, 0.35); background: transparent;">
                                    {{ $technology->name }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            {{-- Description --}}
            <div class="mb-4">
                <h5 class="text-secondary mb-2"><i class="bi bi-file-text me-1"></i> {{ __("Description") }}</h5>
                <p class="mb-0">{{ $project->description ?: '—' }}</p>
            </div>

            <hr>

            {{-- Actions --}}
            <div class="d-flex justify-content-between align-items-center">
                <button type="button" class="btn btn-outline-danger shadow-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-project-name="{{ $project->title }}" data-action="{{ route('admin.projects.destroy', $project->id) }}">
                    <i class="bi bi-trash me-1"></i> {{ __("Delete") }}
                </button>
                <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-outline-warning shadow-sm">
                    <i class="bi bi-pencil-square me-1"></i> {{ __("Edit") }}
                </a>
            </div>
        </div>
    </div>

    @include('admin.projects.partials.delete-modal')
@endsection
