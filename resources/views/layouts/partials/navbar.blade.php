<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="{{ route('admin.projects.index') }}">
            <i class="bi bi-folder2-open"></i>
            <span>{{ __("Portfolio Admin") }}</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarProjects" aria-controls="navbarProjects" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarProjects">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="d-flex align-items-center gap-2 px-3 py-1">
                    <span class="small text-white-50 fw-semibold user-select-none" id="themeLabel" style="cursor: pointer;">{{ __('Light theme') }}</span>
                    <button class="theme-toggle" id="themeToggle" title="Toggle tema" type="button">
                        <i class="bi bi-toggle-off" id="themeIcon"></i>
                    </button>
                </li>

                <li class="nav-item dropdown px-2">
                    <a class="nav-link dropdown-toggle py-1" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ strtoupper(app()->getLocale()) }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item {{ app()->getLocale() === 'en' ? 'active' : '' }}" href="{{ route('language', 'en') }}">EN</a>
                        <a class="dropdown-item {{ app()->getLocale() === 'it' ? 'active' : '' }}" href="{{ route('language', 'it') }}">IT</a>
                    </div>
                </li>

                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Log in') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('dashboard') }}">{{ __('Dashboard') }}</a>
                        <a class="dropdown-item" href="{{ url('profile') }}">{{ __('Profile') }}</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Log out') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
