@extends('layouts.projects')

@section('title', __("Categories"))

@section('content')
    @include('admin.partials.session-alert')

    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center mb-4 gap-3">
        <div>
            <h1 class="h3 fw-bold mb-1 font-display">{{ __("Categories") }}</h1>
            <p class="text-secondary small mb-0">{{ __("Manage categories") }}</p>
        </div>
        <a href="{{ route('admin.types.create') }}" class="btn btn-primary btn-lg shadow-sm">
            <i class="bi bi-plus-lg me-1"></i> {{ __("New Category") }}
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="table-responsive">
            <table class="table table-hover table-striped table-admin align-middle mb-0">
                <thead class="table-thead">
                    <tr>
                        <th scope="col" class="ps-3" style="width: 80px;">ID</th>
                        <th scope="col">{{ __("Name") }}</th>
                        <th scope="col">{{ __("Slug") }}</th>
                        <th scope="col" class="text-center" style="width: 100px;">{{ __("Projects") }}</th>
                        <th scope="col" class="text-center" style="width: 150px;">{{ __("Actions") }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($types as $type)
                        <tr>
                            <td class="ps-3 fw-bold text-primary">{{ $type->id }}</td>
                            <td class="fw-semibold">{{ $type->name }}</td>
                            <td><code>{{ $type->slug }}</code></td>
                            <td class="text-center">
                                <span class="badge bg-secondary bg-opacity-10 text-secondary px-2 py-1">{{ $type->projects_count }}</span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.types.show', $type->id) }}" class="btn btn-sm btn-icon btn-outline-primary shadow-sm" title="{{ __("View") }}">
                                    <i class="bi bi-eye-fill"></i>
                                </a>
                                <a href="{{ route('admin.types.edit', $type->id) }}" class="btn btn-sm btn-icon btn-outline-warning shadow-sm" title="{{ __("Edit") }}">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <form action="{{ route('admin.types.destroy', $type->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-icon btn-outline-danger shadow-sm" onclick="return confirm('{{ __("Are you sure you want to delete this category?") }}')" title="{{ __("Delete") }}">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-secondary">
                                <svg width="48" height="48" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg" style="color: var(--bs-secondary-color); opacity: 0.35; margin-bottom: 0.25rem;">
                                    <path d="M52 44a3 3 0 0 1-3 3H15a3 3 0 0 1-3-3V22a3 3 0 0 1 3-3h14l3 4.5h20a3 3 0 0 1 3 3V44z" fill="currentColor" fill-opacity="0.12" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>
                                    <rect x="24" y="28" width="16" height="18" rx="2" fill="currentColor" fill-opacity="0.06" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
                                    <line x1="28" y1="33" x2="36" y2="33" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                    <line x1="28" y1="37" x2="34" y2="37" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                    <line x1="28" y1="41" x2="31" y2="41" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                </svg>
                                <p class="mt-2 mb-2">{{ __("No categories found.") }}</p>
                                <a href="{{ route('admin.types.create') }}" class="btn btn-sm btn-outline-primary">{{ __("Create one now!") }}</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
