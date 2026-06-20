@extends('layouts.projects')

@section('title', $project->title)

@section('content')
    @include('admin.partials.session-alert')

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-header d-flex justify-content-between align-items-center py-3">
                    <div>
                        <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2">
                            <i class="fa-solid fa-info-circle me-1"></i> Dettagli Progetto
                        </span>
                    </div>
                    <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary btn-sm">
                        <i class="fa-solid fa-arrow-left me-1"></i> Indietro
                    </a>
                </div>
                <div class="card-body p-4">
                    <h2 class="fw-bold mb-3">{{ $project->title }}</h2>
                    <p class="text-secondary mb-0">{{ $project->description }}</p>

                    <hr class="my-4">

                    @include('admin.projects.partials.show-metadata')
                </div>
                <div class="card-footer d-flex justify-content-end gap-2 py-3">
                    <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning shadow-sm">
                        <i class="fa-solid fa-pen-to-square me-1"></i> Modifica
                    </a>
                    <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger shadow-sm" onclick="return confirm('Sei sicuro di voler eliminare questo progetto?')">
                            <i class="fa-solid fa-trash me-1"></i> Elimina
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
