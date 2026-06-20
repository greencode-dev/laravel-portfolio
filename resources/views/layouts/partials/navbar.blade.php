<nav class="navbar navbar-dark bg-dark shadow-sm mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="{{ route('admin.projects.index') }}">
            <i class="fa-solid fa-folder-open"></i>
            <span>Portfolio Admin</span>
        </a>

        <div class="d-flex align-items-center gap-2">
            <span class="small text-white-50 fw-semibold user-select-none" id="themeLabel" style="cursor: pointer;">Light Mode</span>
            <button class="theme-toggle" id="themeToggle" title="Toggle tema" type="button">
                <i class="fa-solid fa-toggle-off" id="themeIcon"></i>
            </button>
        </div>
    </div>
</nav>
