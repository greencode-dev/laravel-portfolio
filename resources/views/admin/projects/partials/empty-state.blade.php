<tr>
    <td colspan="5" class="text-center py-5">
        <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg" style="color: var(--bs-secondary-color); opacity: 0.35; margin-bottom: 0.25rem;">
            <path d="M52 44a3 3 0 0 1-3 3H15a3 3 0 0 1-3-3V22a3 3 0 0 1 3-3h14l3 4.5h20a3 3 0 0 1 3 3V44z" fill="currentColor" fill-opacity="0.12" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>
            <rect x="24" y="28" width="16" height="18" rx="2" fill="currentColor" fill-opacity="0.06" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
            <line x1="28" y1="33" x2="36" y2="33" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
            <line x1="28" y1="37" x2="34" y2="37" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
            <line x1="28" y1="41" x2="31" y2="41" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
            <circle cx="49" cy="18" r="6" fill="var(--bs-primary)" fill-opacity="0.15" stroke="var(--bs-primary)" stroke-width="1.5"/>
            <line x1="49" y1="15" x2="49" y2="21" stroke="var(--bs-primary)" stroke-width="1.5" stroke-linecap="round"/>
            <line x1="46" y1="18" x2="52" y2="18" stroke="var(--bs-primary)" stroke-width="1.5" stroke-linecap="round"/>
        </svg>
        <p class="text-secondary mt-3 mb-3 fs-5">{{ __("No projects found.") }}</p>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary shadow-sm">
            <i class="bi bi-plus-lg me-1"></i> {{ __("Create one now!") }}
        </a>
    </td>
</tr>
