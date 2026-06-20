<div class="d-flex justify-content-center gap-1">
    <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-sm btn-icon btn-info text-white" title="Visualizza">
        <i class="fa-solid fa-eye"></i>
    </a>
    <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-sm btn-icon btn-warning" title="Modifica">
        <i class="fa-solid fa-pen-to-square"></i>
    </a>
    <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-icon btn-danger" onclick="return confirm('Sei sicuro di voler eliminare questo progetto?')" title="Elimina">
            <i class="fa-solid fa-trash"></i>
        </button>
    </form>
</div>
