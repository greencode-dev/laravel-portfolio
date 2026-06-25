<form action="{{ $action ?? route('admin.types.store') }}" method="POST">
    @csrf
    @isset($method)
        @method($method)
    @endisset

    <div class="mb-3">
        <label for="name" class="form-label fw-medium">{{ __("Name") }} <span class="text-danger">*</span></label>
        <input type="text" name="name" id="name"
            class="form-control @error('name') is-invalid @enderror"
            value="{{ old('name', $type->name ?? '') }}"
            placeholder="{{ __("Enter the type name") }}" required>
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="d-flex justify-content-end gap-2 align-items-center">
        <a href="{{ $cancelRoute ?? route('admin.types.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-x-lg me-1"></i> {{ __("Cancel") }}
        </a>
        <button type="submit" class="btn btn-primary shadow-sm">
            <i class="bi {{ $submitIcon ?? 'bi-check-lg' }} me-1"></i> {{ $submitLabel ?? __("Save") }}
        </button>
    </div>
</form>
