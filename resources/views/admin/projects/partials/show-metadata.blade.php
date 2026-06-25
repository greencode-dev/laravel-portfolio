<div class="d-flex flex-wrap gap-3 small text-secondary mt-2">
    @if ($project->type)
        <span class="badge badge-type-{{ $project->type->slug }} px-2 py-1">{{ $project->type->name }}</span>
    @endif
    <div class="d-flex flex-wrap gap-3">
        <span><strong>{{ __("Type:") }}</strong>
            @if ($project->type)
                {{ $project->type->name }}
            @else
                —
            @endif
        </span>
        <span><strong>{{ __("Created on:") }}</strong> {{ $project->created_at->format('d/m/Y H:i') }}</span>
        <span><strong>{{ __("Updated on:") }}</strong> {{ $project->updated_at->format('d/m/Y H:i') }}</span>
    </div>
</div>
