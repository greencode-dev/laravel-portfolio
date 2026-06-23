<tr>
    <td colspan="5" class="text-center py-5">
        <i class="bi bi-folder2-open d-block mb-2" style="font-size: 2.5rem; color: var(--bs-secondary-color);"></i>
        <p class="text-secondary mt-3 mb-3 fs-5">{{ __("No projects found.") }}</p>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary shadow-sm">
            <i class="bi bi-plus-lg me-1"></i> {{ __("Create one now!") }}
        </a>
    </td>
</tr>
