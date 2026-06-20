@csrf

<div class="mb-3">
    <label for="title" class="form-label fw-medium">Titolo <span class="text-danger">*</span></label>
    <input type="text" name="title" id="title"
        class="form-control @error('title') is-invalid @enderror"
        value="{{ old('title', $project->title ?? '') }}"
        placeholder="Inserisci il titolo del progetto" required>
    @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="description" class="form-label fw-medium">Descrizione</label>
    <textarea name="description" id="description" rows="6"
        class="form-control @error('description') is-invalid @enderror"
        placeholder="Inserisci una descrizione del progetto (opzionale)">{{ old('description', $project->description ?? '') }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="d-flex justify-content-end gap-2 mt-4">
    <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary">
        <i class="fa-solid fa-xmark me-1"></i> Annulla
    </a>
    <button type="submit" class="btn btn-primary shadow-sm">
        <i class="fa-solid {{ $submitIcon ?? 'fa-check' }} me-1"></i> {{ $submitLabel ?? 'Salva' }}
    </button>
</div>
