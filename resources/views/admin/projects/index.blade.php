@extends('layouts.projects')

@section('title', 'Lista Progetti')

@section('content')
    <h1 class="mb-4">I miei Progetti</h1>
    <div class="d-flex justify-content-end mb-4">
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary shadow-sm">
            Nuovo Progetto
        </a>
    </div>

    @if (session('success') || session('message') || session('status'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            {{ session('success') ?? session('message') ?? session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="table-responsive">
            <table class="table table-hover table-striped mb-0 align-middle">
                <thead class="table-dark">
                    <tr>
                        <th scope="col" class="px-3">ID</th>
                        <th scope="col">Titolo</th>
                        <th scope="col">Descrizione</th>
                        <th scope="col" class="text-center">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $project)
                        <tr>
                            <td class="px-3 fw-bold">{{ $project->id }}</td>
                            <td class="fw-semibold">{{ $project->title }}</td>
                            <td class="text-muted">{{ Str::limit($project->description, 70) }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-sm btn-info text-white" title="Visualizza">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-sm btn-warning" title="Modifica">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Sei sicuro di voler eliminare questo progetto?')" title="Elimina">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-muted">
                                Nessun progetto trovato. <a href="{{ route('admin.projects.create') }}">Creane uno ora!</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($projects->hasPages())
            <div class="card-footer py-3">
                {{ $projects->links() }}
            </div>
        @endif
    </div>
@endsection
