<tr>
    <td class="ps-3 fw-bold text-primary">{{ $project->id }}</td>
    <td class="fw-semibold">{{ $project->title }}</td>
    <td>
        @if ($project->type)
            <span class="badge bg-primary bg-opacity-10 text-primary px-2 py-1">{{ $project->type }}</span>
        @else
            <span class="text-secondary">—</span>
        @endif
    </td>
    <td class="text-secondary">{{ Str::limit($project->description, 70) }}</td>
    <td class="text-center">
        @include('admin.projects.partials.action-buttons')
    </td>
</tr>
