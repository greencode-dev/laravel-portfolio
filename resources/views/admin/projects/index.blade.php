@extends('layouts.projects')

@section('title', 'Lista Progetti')

@section('content')
    @include('admin.partials.session-alert')

    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center mb-4 gap-3">
        <div>
            <h1 class="h3 fw-bold mb-1">I miei Progetti</h1>
            <p class="text-secondary small mb-0">Gestisci i tuoi progetti</p>
        </div>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary shadow-sm">
            <i class="fa-solid fa-plus me-1"></i> Nuovo Progetto
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th scope="col" class="ps-3" style="width: 80px;">ID</th>
                        <th scope="col">Titolo</th>
                        <th scope="col">Tipologia</th>
                        <th scope="col">Descrizione</th>
                        <th scope="col" class="text-center" style="width: 150px;">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $project)
                        @include('admin.projects.partials.table-row')
                    @empty
                        @include('admin.projects.partials.empty-state')
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($projects->hasPages())
            <div class="card-footer py-3 d-flex justify-content-center">
                {{ $projects->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>
@endsection
