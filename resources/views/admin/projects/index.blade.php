@extends('layouts.projects')

@section('title', __("Project List"))

@section('content')
    @include('admin.partials.session-alert')

    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center mb-4 gap-3">
        <div>
            <h1 class="h3 fw-bold mb-1 font-display">{{ __("My Projects") }}</h1>
            <p class="text-secondary small mb-0">{{ __("Manage your projects") }}</p>
        </div>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary btn-lg shadow-sm">
            <i class="bi bi-plus-lg me-1"></i> {{ __("New Project") }}
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="table-responsive">
            <table class="table table-hover table-striped table-admin align-middle mb-0">
                <thead class="table-thead">
                    <tr>
                        <th scope="col" class="ps-3" style="width: 80px;">ID</th>
                        <th scope="col">{{ __("Title") }}</th>
                        <th scope="col">{{ __("Type") }}</th>
                        <th scope="col">{{ __("Description") }}</th>
                        <th scope="col" class="text-center" style="width: 150px;">{{ __("Actions") }}</th>
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
            <div class="card-footer py-3">
                <div class="d-flex flex-column flex-lg-row justify-content-between align-items-center gap-3">
                    <div class="d-flex align-items-center gap-2">
                        <label for="perPage" class="small text-secondary mb-0">{{ __("Rows per page:") }}</label>
                        <select id="perPage" class="form-select form-select-sm" style="width: auto;" onchange="window.location.href='{{ request()->url() }}?perPage='+this.value">
                            <option value="10" {{ request('perPage', 10) == 10 ? 'selected' : '' }}>10</option>
                            <option value="25" {{ request('perPage', 10) == 25 ? 'selected' : '' }}>25</option>
                            <option value="50" {{ request('perPage', 10) == 50 ? 'selected' : '' }}>50</option>
                        </select>
                    </div>
                    <div class="small text-secondary">
                        {{ __("Showing") }}
                        <span class="fw-semibold">{{ $projects->firstItem() }}</span>
                        {{ __("to") }}
                        <span class="fw-semibold">{{ $projects->lastItem() }}</span>
                        {{ __("of") }}
                        <span class="fw-semibold">{{ $projects->total() }}</span>
                        {{ __("results") }}
                    </div>
                    {{ $projects->links('vendor.pagination.bootstrap-5-links') }}
                </div>
            </div>
        @endif
    </div>

    @include('admin.projects.partials.delete-modal')
@endsection
