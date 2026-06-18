@extends('layouts.projects')

@section('title', $project->title)

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                    <h5 class="mb-0 fw-bold text-primary">Dettagli Progetto</h5>
                    <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary btn-sm">
                        <i class="fa-solid fa-arrow-left me-1"></i> Torna alla lista
                    </a>
                </div>
                <div class="card-body p-4">
                    <h2 class="display-6 fw-bold mb-3">{{ $project->title }}</h2>
                    <p class="lead text-muted">{{ $project->description }}</p>
                </div>
                <div class="card-footer bg-light d-flex justify-content-end gap-2 py-3">
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