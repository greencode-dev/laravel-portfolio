@if ($project->type)
    @php
        $tColor = $project->type->color ?? '#6366f1';
        $tRgb = implode(', ', sscanf($tColor, '#%02x%02x%02x') ?: [99, 102, 241]);
    @endphp
    <span class="badge-tech" style="color: {{ $tColor }}; background: rgba({{ $tRgb }}, 0.12);">
        {{ $project->type->name }}
    </span>
@endif
