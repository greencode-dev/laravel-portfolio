@extends('layouts.projects')

@section('title', __("Project List"))

@section('content')
    @include('admin.partials.session-alert')

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
        <div>
            <h1 class="h3 fw-bold mb-1 font-display">{{ __("My Projects") }}</h1>
            <p class="text-secondary small mb-0">{{ __("Manage your projects") }}</p>
        </div>
        <div class="d-flex align-items-center gap-2">
            <select id="typeFilter" class="form-select form-select-sm" style="width: auto; min-width: 180px;" onchange="window.location.href=this.value">
                <option value="{{ route('admin.projects.index', request()->except('type_id')) }}">{{ __("All categories") }}</option>
                @foreach ($types as $type)
                    @php
                        $typeColor = $type->color ?? '#6366f1';
                    @endphp
                    <option value="{{ route('admin.projects.index', array_merge(request()->except('type_id'), ['type_id' => $type->id])) }}" {{ request('type_id') == $type->id ? 'selected' : '' }} style="color: {{ $typeColor }};">● {{ $type->name }}</option>
                @endforeach
            </select>
            @if (request('type_id'))
                <a href="{{ route('admin.projects.index', request()->except('type_id')) }}" class="btn btn-sm btn-outline-danger" title="{{ __("Clear filter") }}">
                    <i class="bi bi-x-lg"></i>
                </a>
            @endif
        </div>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary shadow-sm flex-shrink-0">
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
                        <th scope="col">{{ __("Category") }}</th>
                        <th scope="col" style="width: 60px;">{{ __("Image") }}</th>
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

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var sel = document.getElementById('typeFilter');
            if (sel) {
                function syncColor() {
                    var opt = sel.options[sel.selectedIndex];
                    sel.style.color = sel.selectedIndex > 0 ? (opt.style.color || '') : '';
                }
                syncColor();
                sel.addEventListener('change', syncColor);
            }
        });
    </script>
    @endpush
@endsection
