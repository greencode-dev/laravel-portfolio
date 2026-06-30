<tr>
    <td class="ps-3 fw-bold text-primary">{{ $project->id }}</td>
    <td class="fw-semibold">{{ $project->title }}</td>
    <td>
        @if ($project->type)
            @php
                $tColor = $project->type->color ?? '#6366f1';
                $tRgb = implode(', ', sscanf($tColor, '#%02x%02x%02x') ?: [99, 102, 241]);
            @endphp
            @if (request('type_id'))
                <span class="badge-tech" style="color: {{ $tColor }}; background: rgba({{ $tRgb }}, 0.12);">
                    {{ $project->type->name }}
                </span>
            @else
                <a href="{{ route('admin.projects.index', ['type_id' => $project->type->id]) }}" class="text-decoration-none">
                    <span class="badge-tech" style="color: {{ $tColor }}; background: rgba({{ $tRgb }}, 0.12);">
                        {{ $project->type->name }}
                    </span>
                </a>
            @endif
        @else
            <span class="text-secondary">—</span>
        @endif
    </td>
    <td>
        @if ($project->image_url)
            <img src="{{ $project->image_url }}" alt="{{ $project->image_description ?? $project->title }}" class="rounded" style="width: 40px; height: 40px; object-fit: cover;">
        @else
            <span class="text-secondary small">—</span>
        @endif
    </td>
    <td class="text-secondary">{{ Str::limit($project->description, 70) }}</td>
    <td class="text-center">
        @include('admin.projects.partials.action-buttons')
    </td>
</tr>
