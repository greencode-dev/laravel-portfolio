<form action="{{ $action ?? route('admin.projects.store') }}" method="POST">
    @csrf
    @isset($method)
        @method($method)
    @endisset

    <div class="mb-3">
        <label for="title" class="form-label fw-medium">{{ __("Title") }} <span class="text-danger">*</span></label>
        <input type="text" name="title" id="title"
            class="form-control @error('title') is-invalid @enderror"
            value="{{ old('title', $project->title ?? '') }}"
            placeholder="{{ __("Enter the project title") }}" required>
        @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="type" class="form-label fw-medium">{{ __("Type") }}</label>
        <select name="type" id="type" class="form-select @error('type') is-invalid @enderror">
            <option value="">{{ __("-- Select a type --") }}</option>
            @foreach (config('projects.types') as $type)
                <option value="{{ $type }}" {{ old('type', $project->type ?? '') == $type ? 'selected' : '' }}>{{ $type }}</option>
            @endforeach
        </select>
        @error('type')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="description" class="form-label fw-medium">{{ __("Description") }}</label>
        <textarea name="description" id="description" rows="5"
            class="form-control @error('description') is-invalid @enderror"
            placeholder="{{ __("Enter a project description (optional)") }}">{{ old('description', $project->description ?? '') }}</textarea>
        @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="d-flex gap-2">
        <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-x-lg me-1"></i> {{ __("Cancel") }}
        </a>
        <button type="submit" class="btn btn-primary shadow-sm">
            <i class="bi {{ $submitIcon ?? 'bi-check-lg' }} me-1"></i> {{ $submitLabel ?? __("Save") }}
        </button>
    </div>
</form>
