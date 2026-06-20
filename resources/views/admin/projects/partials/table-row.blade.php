<tr>
    <td class="ps-3 fw-bold text-primary">{{ $project->id }}</td>
    <td class="fw-semibold">{{ $project->title }}</td>
    <td class="text-secondary">{{ Str::limit($project->description, 70) }}</td>
    <td class="text-center">
        @include('admin.projects.partials.action-buttons')
    </td>
</tr>
