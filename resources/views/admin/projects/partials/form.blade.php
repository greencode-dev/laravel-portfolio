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
        <label for="type_id" class="form-label fw-medium">{{ __("Type") }}</label>
        <select name="type_id" id="type_id" class="form-select @error('type_id') is-invalid @enderror">
            <option value="">{{ __("-- Select a type --") }}</option>
            @foreach ($types as $type)
                <option value="{{ $type->id }}" {{ old('type_id', $project->type_id ?? '') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
            @endforeach
        </select>
        @error('type_id')
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

    <div class="mb-4">
        <label class="form-label fw-medium">{{ __("Technologies") }}</label>
        @error('technologies')
            <div class="text-danger small mb-2">{{ $message }}</div>
        @enderror
        <div class="d-flex flex-wrap gap-2">
            @forelse ($technologies as $technology)
                <div class="form-check form-check-inline">
                    <input type="checkbox" name="technologies[]" id="technology_{{ $technology->id }}"
                        value="{{ $technology->id }}"
                        class="form-check-input @error('technologies') is-invalid @enderror"
                        {{ in_array($technology->id, old('technologies', $technologyIds ?? [])) ? 'checked' : '' }}>
                    <label class="form-check-label" for="technology_{{ $technology->id }}">
                        {{ $technology->name }}
                    </label>
                </div>
            @empty
                <p class="text-secondary small mb-0">{{ __("No technologies available.") }}</p>
            @endforelse
        </div>
    </div>

    <div class="d-flex justify-content-end gap-2 align-items-center">
        <a href="{{ $cancelRoute ?? route('admin.projects.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-x-lg me-1"></i> {{ __("Cancel") }}
        </a>
        <button type="submit" class="btn btn-primary shadow-sm">
            <i class="bi {{ $submitIcon ?? 'bi-check-lg' }} me-1"></i> {{ $submitLabel ?? __("Save") }}
        </button>
    </div>
</form>
