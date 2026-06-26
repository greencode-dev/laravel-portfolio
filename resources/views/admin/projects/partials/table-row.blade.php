<tr>
    <td class="ps-3 fw-bold text-primary">{{ $project->id }}</td>
    <td class="fw-semibold">{{ $project->title }}</td>
    <td>
        @if ($project->type)
            @php
                $tColor = $project->type->color ?? '#6366f1';
                $tRgb = implode(', ', sscanf($tColor, '#%02x%02x%02x') ?: [99, 102, 241]);
            @endphp
            <span class="badge-tech" style="color: {{ $tColor }}; background: rgba({{ $tRgb }}, 0.12);">
                {{ $project->type->name }}
            </span>
        @else
            <span class="text-secondary">—</span>
        @endif
    </td>
    <td class="text-secondary">{{ Str::limit($project->description, 70) }}</td>
    <td class="text-center">
        @include('admin.projects.partials.action-buttons')
    </td>
</tr>
