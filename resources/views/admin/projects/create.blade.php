@extends('layouts.projects')

@section('title', 'Nuovo Progetto')

@section('content')
    @include('admin.partials.session-alert')

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-header d-flex justify-content-between align-items-center py-3">
                    <div>
                        <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2">
                            <i class="fa-solid fa-plus me-1"></i> Nuovo Progetto
                        </span>
                    </div>
                    <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary btn-sm">
                        <i class="fa-solid fa-arrow-left me-1"></i> Indietro
                    </a>
                </div>

                <form action="{{ route('admin.projects.store') }}" method="POST" novalidate>
                    <div class="card-body p-4">
                        @include('admin.projects.partials.form', [
                            'submitLabel' => 'Crea Progetto',
                            'submitIcon' => 'fa-plus',
                        ])
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
