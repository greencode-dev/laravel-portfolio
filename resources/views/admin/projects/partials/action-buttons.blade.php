<a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-sm btn-icon btn-info text-white" title="{{ __("View") }}">
    <i class="bi bi-eye-fill"></i>
</a>
<a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-sm btn-icon btn-warning" title="{{ __("Edit") }}">
    <i class="bi bi-pencil-fill"></i>
</a>
<form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="d-inline">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-icon btn-danger" onclick="return confirm('{{ __("Are you sure you want to delete this project?") }}')" title="{{ __("Delete") }}">
        <i class="bi bi-trash-fill"></i>
    </button>
</form>
