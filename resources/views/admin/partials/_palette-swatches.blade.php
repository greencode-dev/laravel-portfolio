@foreach ($colors as $var => $hex)
    <div class="swatch-row" style="padding: .35rem .5rem;">
        <div class="swatch" style="width: 1.5rem; height: 1.2rem; background: {{ $hex }};"></div>
        <div style="font-size: .75rem; color: {{ $colors['--bs-body-color'] ?? '#000' }};">
            <code>{{ $hex }}</code>
        </div>
    </div>
@endforeach

<div class="mini-card" style="margin: .5rem; padding: .5rem .75rem; font-size: .75rem; background: {{ $colors['--bs-card-bg'] ?? 'transparent' }}; border: 1px solid {{ $colors['--bs-card-border-color'] ?? 'rgba(0,0,0,0.06)' }};">
    <div style="color: {{ $colors['--bs-body-color'] ?? '#000' }};">
        <strong style="font-size: .8rem;">Card preview</strong>
        <p style="margin: .15rem 0 0; opacity: .75;">Body text</p>
        @if (isset($colors['--bs-primary']))
            <span class="mini-btn" style="display: inline-block; margin-top: .25rem; padding: .1rem .6rem; font-size: .7rem; background: {{ $colors['--bs-primary'] }}; color: #fff; border-radius: .25rem;">Primary</span>
        @endif
    </div>
</div>
