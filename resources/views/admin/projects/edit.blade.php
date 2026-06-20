@extends('layouts.projects')

@section('title', 'Modifica Progetto')

@section('content')
    @include('admin.partials.session-alert')

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-header d-flex justify-content-between align-items-center py-3">
                    <div>
                        <span class="badge bg-warning bg-opacity-10 text-warning px-3 py-2">
                            <i class="fa-solid fa-pen-to-square me-1"></i> Modifica Progetto
                        </span>
                    </div>
                    <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary btn-sm">
                        <i class="fa-solid fa-arrow-left me-1"></i> Indietro
                    </a>
                </div>

                <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" novalidate>
                    @csrf
                    @method('PUT')

                    <div class="card-body p-4">
                        @include('admin.projects.partials.form', [
                            'submitLabel' => 'Aggiorna Progetto',
                            'submitIcon' => 'fa-pen-to-square',
                        ])
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
