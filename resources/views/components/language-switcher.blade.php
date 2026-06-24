@props(['variant' => 'nav'])

@php
    $locales = [
        'en' => ['label' => 'English', 'flag' => 'gb'],
        'it' => ['label' => 'Italiano', 'flag' => 'it'],
    ];
    $current = $locales[app()->getLocale()] ?? $locales['en'];
@endphp

@if ($variant === 'nav')
    <li class="nav-item dropdown px-2">
        <a class="nav-link dropdown-toggle py-1" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="fi fi-{{ $current['flag'] }}"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-end">
            @foreach ($locales as $code => $locale)
                <a class="dropdown-item {{ app()->getLocale() === $code ? 'active' : '' }}" href="{{ route('language', $code) }}">
                    <span class="fi fi-{{ $locale['flag'] }} me-1"></span> {{ $locale['label'] }}
                </a>
            @endforeach
        </div>
    </li>
@else
    <div class="dropdown">
        <a class="btn btn-sm btn-outline-secondary border-0 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="fi fi-{{ $current['flag'] }}"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-end">
            @foreach ($locales as $code => $locale)
                <a class="dropdown-item {{ app()->getLocale() === $code ? 'active' : '' }}" href="{{ route('language', $code) }}">
                    <span class="fi fi-{{ $locale['flag'] }} me-1"></span> {{ $locale['label'] }}
                </a>
            @endforeach
        </div>
    </div>
@endif
