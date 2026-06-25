<div class="palette-card" style="background: {{ $colors['--bs-card-bg'] ?? 'transparent' }}; border: 1px solid {{ $colors['--bs-card-border-color'] ?? 'rgba(0,0,0,0.06)' }};">
    <div style="padding: .75rem 1rem; border-bottom: 1px solid {{ $colors['--bs-card-border-color'] ?? 'rgba(0,0,0,0.06)' }}; background: {{ $colors['--bs-body-bg'] }};">
        <strong style="color: {{ $colors['--bs-body-color'] }};">{{ $name }}</strong>
    </div>

    @foreach ($colors as $var => $hex)
        <div class="swatch-row">
            <div class="swatch" style="background: {{ $hex }};"></div>
            <div>
                <div class="swatch-label">{{ $var }}</div>
                <div class="swatch-hex">{{ $hex }}</div>
            </div>
        </div>
    @endforeach

    <div class="mini-card" style="background: {{ $colors['--bs-card-bg'] ?? '#fff' }}; border: 1px solid {{ $colors['--bs-card-border-color'] ?? 'rgba(0,0,0,0.06)' }};">
        <h5 style="color: {{ $colors['--bs-body-color'] ?? '#000' }};">Sample Card</h5>
        <p style="color: {{ $colors['--bs-body-color'] ?? '#000' }};">This is how text looks inside a card with this palette.</p>
        <div style="display: flex; gap: .5rem;">
            <span class="mini-btn" style="background: {{ $colors['--bs-primary'] ?? '#0d6efd' }}; color: #fff;">Primary</span>
            <span class="mini-btn" style="background: {{ $colors['--bs-card-bg'] ?? 'transparent' }}; color: {{ $colors['--bs-body-color'] ?? '#000' }}; border: 1px solid {{ $colors['--bs-body-color'] ?? '#000' }};">Outline</span>
        </div>
    </div>

    @if (isset($colors['--bs-primary']))
        <div class="swatch-row" style="border-top: 1px solid {{ $colors['--bs-card-border-color'] ?? 'rgba(0,0,0,0.06)' }}; background: {{ $colors['--bs-body-bg'] }};">
            <div style="font-size: .8rem; color: {{ $colors['--bs-body-color'] }};">
                <span class="fw-bold">Primary:</span>
                <span class="swatch" style="display: inline-block; width: 1.2rem; height: 1.2rem; vertical-align: middle; background: {{ $colors['--bs-primary'] }}; border-radius: .25rem;"></span>
                <code>{{ $colors['--bs-primary'] }}</code>
            </div>
        </div>
    @endif
</div>
