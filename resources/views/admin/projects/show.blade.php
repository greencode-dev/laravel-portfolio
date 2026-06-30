@extends('layouts.projects')

@section('title', __("Project Details"))

@section('content')
    @include('admin.partials.session-alert')

    <div class="d-flex justify-content-between align-items-start mb-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.projects.index') }}">{{ __("Projects") }}</a></li>
                @if ($project->type)
                    <li class="breadcrumb-item"><a href="{{ route('admin.projects.index', ['type_id' => $project->type->id]) }}">{{ $project->type->name }}</a></li>
                @endif
                <li class="breadcrumb-item active" aria-current="page">{{ $project->title }}</li>
            </ol>
        </nav>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary shadow-sm flex-shrink-0">
            <i class="bi bi-arrow-left me-1"></i> {{ __("Back") }}
        </a>
    </div>

    <div class="card card-accent-left">
        <div class="card-body p-4 p-md-5">
            <div class="row g-4 mb-4">
                <div class="col-md-7 d-flex flex-column">
                    {{-- Title --}}
                    <h2 class="fw-bold font-display mb-1">{{ $project->title }}</h2>

                    {{-- Metadata row 1: ID, timestamps --}}
                    <div class="d-flex flex-wrap gap-3 small text-secondary mb-2">
                        <span><i class="bi bi-hash me-1 text-warning" data-bs-toggle="tooltip" title="ID progetto"></i> {{ $project->id }}</span>
                        <span><i class="bi bi-calendar3 me-1 text-primary" data-bs-toggle="tooltip" title="Data creazione"></i> {{ $project->created_at->format('d/m/Y') }} {{ __("at") }} {{ $project->created_at->format('H:i') }}</span>
                        <span><i class="bi bi-arrow-clockwise me-1 text-success" data-bs-toggle="tooltip" title="Ultimo aggiornamento"></i> {{ $project->updated_at->format('d/m/Y') }} {{ __("at") }} {{ $project->updated_at->format('H:i') }}</span>
                    </div>

                    {{-- Metadata row 2: Category + Technologies inline --}}
                    <div class="d-flex flex-wrap align-items-center gap-2 mb-4">
                        @if ($project->type)
                            @php
                                $tColor = $project->type->color ?? '#6366f1';
                                $tRgb = implode(', ', sscanf($tColor, '#%02x%02x%02x') ?: [99, 102, 241]);
                            @endphp
                            <i class="bi bi-tag me-1" data-bs-toggle="tooltip" title="Categoria"></i>
                            <a href="{{ route('admin.projects.index', ['type_id' => $project->type->id]) }}" class="text-decoration-none">
                                <span class="badge-tech" style="color: {{ $tColor }}; background: rgba({{ $tRgb }}, 0.12); font-size: .8rem; padding: .25rem .6rem;">
                                    {{ $project->type->name }}
                                </span>
                            </a>
                        @endif
                        @if ($project->technologies->isNotEmpty())
                            <i class="bi bi-code-slash me-1" data-bs-toggle="tooltip" title="Tecnologie"></i>
                            @foreach ($project->technologies as $technology)
                                @php
                                    $techColor = $technology->color ?? '#6366f1';
                                    $techRgb = implode(', ', sscanf($techColor, '#%02x%02x%02x') ?: [99, 102, 241]);
                                @endphp
                                <span class="badge-tech" style="color: {{ $techColor }}; border: 1px solid rgba({{ $techRgb }}, 0.35); background: transparent; font-size: .8rem; padding: .25rem .6rem;">
                                    {{ $technology->name }}
                                </span>
                            @endforeach
                        @endif
                    </div>

                    {{-- Description --}}
                    <div class="flex-grow-1 d-flex flex-column">
                        <h5 class="text-secondary mb-2"><i class="bi bi-file-text me-1"></i> {{ __("Description") }}</h5>
                        <textarea class="form-control flex-grow-1" rows="6" style="resize: vertical; min-height: calc(1.5em * 6 + 0.75rem * 2 + 2px);" readonly>{{ $project->description ?: '' }}</textarea>
                    </div>
                </div>

                <div class="col-md-5 d-flex flex-column">
                    <div class="flex-grow-1">
                    {{-- Image --}}
                    @if ($project->image_url)
                        <div class="text-center">
                            <img src="{{ $project->image_url }}"
                                 alt="{{ $project->image_description ?? $project->title }}"
                                 class="img-fluid rounded shadow-sm image-clickable"
                                 style="max-height: 400px;"
                                 data-bs-toggle="modal" data-bs-target="#imageModal">
                            @if ($project->image_description)
                                <p class="text-secondary small mt-2 mb-0"><em>{{ $project->image_description }}</em></p>
                            @endif
                        </div>
                    @else
                        <div class="image-placeholder">
                            <div>
                                <i class="bi bi-image"></i>
                                <p class="fw-medium mb-0 mt-2">{{ __("No image") }}</p>
                            </div>
                        </div>
                    @endif
                    </div>
                </div>
            </div>

            {{-- Actions --}}
            <div class="d-flex justify-content-end align-items-center pt-3 gap-2" style="border-top: 1px solid var(--bs-border-color);">
                <button type="button" class="btn btn-outline-danger shadow-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-project-name="{{ $project->title }}" data-action="{{ route('admin.projects.destroy', $project->id) }}">
                    <i class="bi bi-trash me-1"></i> {{ __("Delete") }}
                </button>
                <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning text-white shadow-sm">
                    <i class="bi bi-pencil-square me-1"></i> {{ __("Edit") }}
                </a>
            </div>
        </div>
    </div>

    @include('admin.projects.partials.delete-modal')

    @if ($project->image_url)
        {{-- Image lightbox modal --}}
        <div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content bg-transparent border-0 shadow-none">
                    <div class="modal-body p-0 text-center">
                        <img src="{{ $project->image_url }}"
                             alt="{{ $project->image_description ?? $project->title }}"
                             class="img-fluid rounded shadow">
                    </div>
                </div>
            </div>
        </div>
    @endif
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map(function (el) { return new bootstrap.Tooltip(el); });
        });
    </script>
    @endpush
@endsection
