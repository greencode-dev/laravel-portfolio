<a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-sm btn-icon btn-outline-primary shadow-sm" title="{{ __("View") }}">
    <i class="bi bi-eye-fill"></i>
</a>
<a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-sm btn-icon btn-outline-warning shadow-sm" title="{{ __("Edit") }}">
    <i class="bi bi-pencil-fill"></i>
</a>
<button type="button" class="btn btn-sm btn-icon btn-outline-danger shadow-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-project-name="{{ $project->title }}" data-action="{{ route('admin.projects.destroy', $project->id) }}" title="{{ __("Delete") }}">
    <i class="bi bi-trash-fill"></i>
</button>
