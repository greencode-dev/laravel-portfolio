<div class="row g-3 text-secondary small">
    @if ($project->type)
    <div class="col-sm-6">
        <div class="d-flex align-items-center gap-2">
            <i class="fa-solid fa-tag text-primary"></i>
            <span><strong>Tipologia:</strong>
                <span class="badge bg-primary bg-opacity-10 text-primary px-2 py-1">{{ $project->type }}</span>
            </span>
        </div>
    </div>
    @endif
    <div class="col-sm-6">
        <div class="d-flex align-items-center gap-2">
            <i class="fa-solid fa-calendar text-primary"></i>
            <span><strong>Creato il:</strong> {{ $project->created_at->format('d/m/Y H:i') }}</span>
        </div>
    </div>
    @if ($project->updated_at != $project->created_at)
    <div class="col-sm-6">
        <div class="d-flex align-items-center gap-2">
            <i class="fa-solid fa-rotate text-info"></i>
            <span><strong>Aggiornato il:</strong> {{ $project->updated_at->format('d/m/Y H:i') }}</span>
        </div>
    </div>
    @endif
</div>
