@extends('layouts.projects')

@section('title', __("Project Types"))

@section('content')
    @include('admin.partials.session-alert')

    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center mb-4 gap-3">
        <div>
            <h1 class="h3 fw-bold mb-1 font-display">{{ __("Project Types") }}</h1>
            <p class="text-secondary small mb-0">{{ __("Manage project types") }}</p>
        </div>
        <a href="{{ route('admin.types.create') }}" class="btn btn-primary shadow-sm">
            <i class="bi bi-plus-lg me-1"></i> {{ __("New Type") }}
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
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
                                    <button type="submit" class="btn btn-sm btn-icon btn-outline-danger shadow-sm" onclick="return confirm('{{ __("Are you sure you want to delete this type?") }}')" title="{{ __("Delete") }}">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-secondary">
                                <i class="bi bi-folder2-open d-block fs-2 mb-2"></i>
                                {{ __("No types found.") }}
                                <a href="{{ route('admin.types.create') }}" class="d-block mt-2">{{ __("Create one now!") }}</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
