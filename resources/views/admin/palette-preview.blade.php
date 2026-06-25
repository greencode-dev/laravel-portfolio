<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palette Preview</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { padding: 2rem; font-family: system-ui, sans-serif; background: #fafafa; }
        h1 { margin-bottom: 2rem; font-weight: 700; }
        .palette-card { border-radius: .75rem; box-shadow: 0 2px 12px rgba(0,0,0,.08); margin-bottom: 2rem; transition: transform .15s; border: 1px solid rgba(0,0,0,.06); }
        .palette-card:hover { transform: translateY(-2px); }
        .swatch-row { display: flex; align-items: center; gap: .75rem; padding: .6rem 1rem; font-size: .85rem; font-family: monospace; }
        .swatch { width: 2.5rem; height: 2rem; border-radius: .375rem; border: 1px solid rgba(0,0,0,.08); flex-shrink: 0; }
        .swatch-label { min-width: 6rem; font-weight: 600; }
        .swatch-hex { color: #666; }
        .mini-card { border-radius: .5rem; padding: .75rem 1rem; margin: .75rem 1rem; font-size: .875rem; }
        .mini-card h5 { margin-bottom: .25rem; font-weight: 600; }
        .mini-card p { margin-bottom: 0; opacity: .75; }
        .mini-btn { display: inline-block; padding: .25rem .75rem; border-radius: .375rem; text-decoration: none; font-size: .8rem; margin-top: .5rem; border: none; cursor: default; }
        .section-title { font-size: 1.25rem; font-weight: 700; margin-bottom: .25rem; }
        .section-sub { font-size: .85rem; color: #666; margin-bottom: 1.75rem; }
        .nav-tabs-custom { display: flex; gap: .5rem; margin-bottom: 2rem; flex-wrap: wrap; }
        .nav-tabs-custom a { text-decoration: none; padding: .4rem 1rem; border-radius: 2rem; font-size: .9rem; font-weight: 500; }
        .split-card { display: flex; border-radius: .75rem; box-shadow: 0 2px 12px rgba(0,0,0,.08); border: 1px solid rgba(0,0,0,.06); }
        .split-half { flex: 1; padding: 1rem; }
        .split-label { font-size: .7rem; text-transform: uppercase; letter-spacing: .05em; font-weight: 600; margin-bottom: .75rem; opacity: .7; }
        .note { font-size: .85rem; color: #666; margin-top: 3rem; border-top: 1px solid #ddd; padding-top: 1rem; }
        .back-top { position: fixed; bottom: 2rem; right: 2rem; width: 2.5rem; height: 2.5rem; border-radius: 50%; background: rgba(0,0,0,.06); border: 1px solid rgba(0,0,0,.1); display: flex; align-items: center; justify-content: center; font-size: 1.2rem; text-decoration: none; color: #666; transition: all .15s; opacity: .7; }
        .back-top:hover { opacity: 1; background: rgba(0,0,0,.1); color: #333; }
        .section-divider { height: 1px; background: linear-gradient(90deg, transparent, rgba(0,0,0,.08), transparent); margin: 2.5rem 0; }
        .primary-badge { display: inline-block; padding: .15rem .5rem; border-radius: 2rem; font-size: .7rem; font-weight: 600; color: #fff; }
        .primary-link { text-decoration: underline; text-underline-offset: 2px; cursor: default; }
        .table-sample { width: 100%; border-collapse: collapse; font-size: .75rem; margin: .5rem 0; }
        .table-sample th { padding: .35rem .5rem; text-align: left; font-weight: 600; text-transform: uppercase; letter-spacing: .04em; border-bottom: 2px solid; }
        .table-sample td { padding: .35rem .5rem; }
        .mix-picker { display: flex; gap: .5rem; align-items: center; flex-wrap: wrap; margin-bottom: 1.5rem; }
        .mix-picker label { font-size: .85rem; font-weight: 600; }
        .mix-picker select { font-size: .85rem; padding: .25rem .5rem; border-radius: .375rem; border: 1px solid #ccc; }
        .demo-btn { display: inline-block; padding: .3rem .75rem; border-radius: .375rem; font-size: .8rem; font-weight: 500; text-decoration: none; margin-right: .35rem; margin-bottom: .25rem; }
        .strada-card { border-radius: .75rem; box-shadow: 0 2px 12px rgba(0,0,0,.08); margin-bottom: 2rem; border: 1px solid rgba(0,0,0,.08); transition: transform .15s; }
        .strada-card:hover { transform: translateY(-2px); }
        .strada-card-header { padding: 1rem 1.25rem; font-weight: 700; font-size: 1rem; border-bottom: 1px solid rgba(0,0,0,.06); }
        .strada-card-body { padding: 1.25rem; }
        .strada-option { display: flex; align-items: center; gap: .75rem; padding: .5rem .75rem; border-radius: .5rem; margin-bottom: .5rem; transition: background .15s; cursor: default; }
        .strada-option:hover { background: rgba(0,0,0,.03); }
        .strada-option .preview-dot { width: 1rem; height: 1rem; border-radius: 50%; flex-shrink: 0; border: 1px solid rgba(0,0,0,.08); }
        .strada-option .preview-bar { height: .5rem; border-radius: .25rem; flex: 1; }
        .accent-card { border-radius: .5rem; padding: .75rem 1rem; margin-bottom: .75rem; }
        .accent-card-left { border-left: 4px solid; }
        .accent-card-top { border-top: 3px solid; }
        .deco-table { width: 100%; border-collapse: collapse; font-size: .75rem; margin: .5rem 0; border-radius: .375rem; overflow: hidden; }
        .deco-table th { padding: .35rem .5rem; text-align: left; font-weight: 600; font-size: .7rem; text-transform: uppercase; letter-spacing: .04em; }
        .deco-table td { padding: .35rem .5rem; }
    </style>
</head>
<body>

<div class="container">
    @php
        $view = request('view', 'single');

        $lightPalettes = [
            'Stone' => [
                '--bs-body-bg' => '#f5f5f4',
                '--bs-body-color' => '#44403c',
                '--bs-card-bg' => '#fafaf9',
                '--bs-card-border-color' => 'rgba(0,0,0,0.06)',
            ],
            'Slate' => [
                '--bs-body-bg' => '#f1f5f9',
                '--bs-body-color' => '#334155',
                '--bs-card-bg' => '#ffffff',
                '--bs-card-border-color' => 'rgba(0,0,0,0.08)',
                '--bs-primary' => '#6366f1',
            ],
            'Zinc' => [
                '--bs-body-bg' => '#f4f4f5',
                '--bs-body-color' => '#3f3f46',
                '--bs-card-bg' => '#fafafa',
                '--bs-card-border-color' => 'rgba(0,0,0,0.07)',
            ],
            'Azzurro Napoli' => [
                '--bs-body-bg' => '#f6f8fa',
                '--bs-body-color' => '#1e293b',
                '--bs-card-bg' => '#ffffff',
                '--bs-card-border-color' => 'rgba(18, 160, 215, 0.08)',
                '--bs-primary' => '#12A0D7',
            ],
            'Mediterraneo' => [
                '--bs-body-bg' => '#f7f5f0',
                '--bs-body-color' => '#1e293b',
                '--bs-card-bg' => '#ffffff',
                '--bs-card-border-color' => 'rgba(23, 133, 130, 0.08)',
                '--bs-primary' => '#178582',
            ],
        ];

        $darkPalettes = [
            'Slate' => [
                '--bs-body-bg' => '#0f172a',
                '--bs-body-color' => '#e2e8f0',
                '--bs-card-bg' => '#1e293b',
                '--bs-card-border-color' => '#334155',
            ],
            'Graphite' => [
                '--bs-body-bg' => '#1c1917',
                '--bs-body-color' => '#d6d3d1',
                '--bs-card-bg' => '#292524',
                '--bs-card-border-color' => '#44403c',
            ],
            'Night' => [
                '--bs-body-bg' => '#0c0c0d',
                '--bs-body-color' => '#e4e4e7',
                '--bs-card-bg' => '#18181b',
                '--bs-card-border-color' => '#27272a',
                '--bs-primary' => '#818cf8',
            ],
            'Notte Napoli' => [
                '--bs-body-bg' => '#0f172a',
                '--bs-body-color' => '#cbd5e1',
                '--bs-card-bg' => '#1a2744',
                '--bs-card-border-color' => '#243b5e',
                '--bs-primary' => '#38bdf8',
            ],
            'Mediterraneo' => [
                '--bs-body-bg' => '#0A1828',
                '--bs-body-color' => '#cbd5e1',
                '--bs-card-bg' => '#0f1f33',
                '--bs-card-border-color' => '#1a2d47',
                '--bs-primary' => '#178582',
            ],
        ];

        $mixes = [
            'Stone + Slate' => ['code' => 'M01', 'light' => $lightPalettes['Stone'], 'dark' => $darkPalettes['Slate'], 'note' => 'Caldo di giorno, sobrio di notte'],
            'Slate + Graphite' => ['code' => 'M02', 'light' => $lightPalettes['Slate'], 'dark' => $darkPalettes['Graphite'], 'note' => 'Professionale al lavoro, caldo la sera'],
            'Zinc + Night' => ['code' => 'M03', 'light' => $lightPalettes['Zinc'], 'dark' => $darkPalettes['Night'], 'note' => 'Minimal puro, massimo contrasto'],
            'Stone + Graphite' => ['code' => 'M04', 'light' => $lightPalettes['Stone'], 'dark' => $darkPalettes['Graphite'], 'note' => 'Warm tutto l\'arco della giornata'],
            'Slate + Night' => ['code' => 'M05', 'light' => $lightPalettes['Slate'], 'dark' => $darkPalettes['Night'], 'note' => 'Chiaro luminoso, scuro drammatico'],
            'Zinc + Slate' => ['code' => 'M06', 'light' => $lightPalettes['Zinc'], 'dark' => $darkPalettes['Slate'], 'note' => 'Neutro di giorno, bilanciato di notte'],
            'Azzurro + Notte' => ['code' => 'M07', 'light' => $lightPalettes['Azzurro Napoli'], 'dark' => $darkPalettes['Notte Napoli'], 'note' => '⚽ Napoli — azzurro mare di giorno, notte stellata'],
            'Azzurro + Slate' => ['code' => 'M08', 'light' => $lightPalettes['Azzurro Napoli'], 'dark' => $darkPalettes['Slate'], 'note' => '⚽ Azzurro chiaro, scuro sobrio'],
            'Mediterraneo' => ['code' => 'M09', 'light' => $lightPalettes['Mediterraneo'], 'dark' => $darkPalettes['Mediterraneo'], 'note' => '🌊 Blu scuro, turchese, oro — eleganza mediterranea'],
        ];

        $primaries = [
            'Indigo'    => '#6366f1',
            'Blue'      => '#3b82f6',
            'Violet'    => '#8b5cf6',
            'Emerald'   => '#059669',
            'Cyan'      => '#06b6d4',
            'Amber'     => '#f59e0b',
            'Rose'      => '#e11d48',
            'Orange'    => '#f97316',
            'Pink'      => '#ec4899',
            'Azzurro Napoli' => '#12A0D7',
            'Turchese' => '#178582',
            'Oro' => '#BFA181',
        ];

        $accentColors = [
            'Cyan'    => '#06b6d4',
            'Emerald' => '#10b981',
            'Violet'  => '#8b5cf6',
            'Rose'    => '#f43f5e',
            'Amber'   => '#f59e0b',
            'Turchese' => '#178582',
            'Oro' => '#BFA181',
        ];

        $selectedMix = request('mix', 'Stone + Slate');
        $currentMix = $mixes[$selectedMix] ?? $mixes['Stone + Slate'];
    @endphp

    <div class="nav-tabs-custom">
        <a href="?view=single" class="btn {{ $view === 'single' ? 'btn-dark' : 'btn-outline-secondary' }}">Singole</a>
        <a href="?view=mix" class="btn {{ $view === 'mix' ? 'btn-dark' : 'btn-outline-secondary' }}">Mix ☀️ + 🌙</a>
        <a href="?view=primary" class="btn {{ $view === 'primary' ? 'btn-dark' : 'btn-outline-secondary' }}">Primary 🎯</a>
        <a href="?view=strade" class="btn {{ $view === 'strade' ? 'btn-dark' : 'btn-outline-secondary' }}">Strade 🧭</a>
    </div>

    <h1>🎨 Palette Colori</h1>

    @if ($view === 'single')
        {{-- LIGHT --}}
        <div class="section-title">☀️ Light</div>
        <div class="section-sub">Palette per il tema chiaro — scegli la base del tuo design.</div>
        <div class="row gy-0 gx-4 mb-5">
            @foreach ($lightPalettes as $name => $colors)
                <div class="col-md-6 col-lg-4">
                    @include('admin.partials._palette-card', ['colors' => $colors, 'name' => $name])
                </div>
            @endforeach
        </div>

        <div class="section-divider"></div>

        {{-- DARK --}}
        <div class="section-title">🌙 Dark</div>
        <div class="section-sub">Palette per il tema scuro.</div>
        <div class="row gy-0 gx-4">
            @foreach ($darkPalettes as $name => $colors)
                <div class="col-md-6 col-lg-4">
                    @include('admin.partials._palette-card', ['colors' => $colors, 'name' => $name])
                </div>
            @endforeach
        </div>

    @elseif ($view === 'mix')
        {{-- MIX --}}
        <div class="section-title">☀️ + 🌙 Mix</div>
        <div class="section-sub">Abbinamenti consigliati tra chiaro e scuro. Ogni card mostra il light a sinistra e il dark a destra.</div>
        <div class="row gy-0 gx-4">
            @foreach ($mixes as $mixName => $mix)
                <div class="col-md-6 col-lg-4 d-flex flex-column">
                    <div class="split-card flex-grow-1">
                        <div class="split-half" style="background: {{ $mix['light']['--bs-body-bg'] }};">
                            <div class="split-label" style="color: {{ $mix['light']['--bs-body-color'] }};">☀️ Light — <strong>{{ $mix['code'] }}</strong> {{ $mixName }}</div>
                            @include('admin.partials._palette-swatches', ['colors' => $mix['light'], 'compact' => true])
                        </div>
                        <div class="split-half" style="background: {{ $mix['dark']['--bs-body-bg'] }}; border-left: 1px solid rgba(255,255,255,.08);">
                            <div class="split-label" style="color: {{ $mix['dark']['--bs-body-color'] }};">🌙 Dark — <strong>{{ $mix['code'] }}</strong> {{ $mixName }}</div>
                            @include('admin.partials._palette-swatches', ['colors' => $mix['dark'], 'compact' => true])
                        </div>
                    </div>
                    <div style="text-align: center; font-size: .8rem; color: #888; padding-top: .5rem; margin-bottom: 2rem;">
                        <code style="background:rgba(0,0,0,.05);padding:.1rem .4rem;border-radius:.25rem;font-weight:600;">{{ $mix['code'] }}</code>
                        {{ $mix['note'] }}
                    </div>
                </div>
            @endforeach
        </div>

    @elseif ($view === 'primary')
        {{-- PRIMARY --}}
        <div class="section-title">🎯 Primary Color</div>
        <div class="section-sub">Come cambia l'aspetto dell'app con diversi colori primari, sulla palette di base selezionata.</div>

        <div class="mix-picker">
            <label for="mix-select">Palette di base:</label>
            <select id="mix-select" onchange="window.location.href='?view=primary&mix=' + encodeURIComponent(this.value)">
                @foreach ($mixes as $mixName => $mix)
                    <option value="{{ $mixName }}" {{ $selectedMix === $mixName ? 'selected' : '' }}>{{ $mix['code'] }} — {{ $mixName }}</option>
                @endforeach
            </select>
            <span style="font-size:.85rem;color:#888;">— {{ $currentMix['note'] }}</span>
        </div>

        <div class="row gy-0 gx-4">
            @foreach ($primaries as $pName => $pHex)
                @php
                    $lightBg = $currentMix['light']['--bs-body-bg'];
                    $lightCardBg = $currentMix['light']['--bs-card-bg'];
                    $lightColor = $currentMix['light']['--bs-body-color'];
                    $lightBorder = $currentMix['light']['--bs-card-border-color'];
                    $lightRgb = implode(', ', sscanf($pHex, '#%02x%02x%02x') ?: [99, 102, 241]);
                @endphp
                <div class="col-md-6 col-lg-4 d-flex flex-column">
                    <div class="split-card flex-grow-1" style="border: 1px solid rgba(0,0,0,.08); margin-bottom: 2rem;">
                        {{-- LIGHT half --}}
                        <div class="split-half" style="background: {{ $lightBg }};">
                            <div class="split-label" style="color: {{ $lightColor }};">
                                <span class="swatch" style="display:inline-block;width:.8rem;height:.8rem;vertical-align:middle;background:{{ $pHex }};border-radius:50%;"></span>
                                ☀️ {{ $pName }}
                            </div>
                            <div style="color:{{ $lightColor }};font-size:.85rem;padding:0 .25rem;">
                                <code style="font-size:.75rem;">{{ $pHex }}</code>
                                <div style="margin-top:.5rem;">
                                    <span class="demo-btn" style="background:{{ $pHex }};color:#fff;">Button</span>
                                    <span class="demo-btn" style="border:1px solid {{ $pHex }};color:{{ $pHex }};">Outline</span>
                                </div>
                                <div style="margin-top:.5rem;">
                                    <span class="primary-badge" style="background:{{ $pHex }};">Badge</span>
                                    <span class="primary-badge" style="background:rgba({{ $lightRgb }},0.12);color:{{ $pHex }};">Ghost</span>
                                    <span class="primary-link" style="color:{{ $pHex }};">Link</span>
                                </div>
                                <table class="table-sample" style="margin-top:.5rem;">
                                    <thead>
                                        <tr><th style="color:{{ $pHex }};border-bottom-color:{{ $pHex }};">Header</th><th style="color:{{ $pHex }};border-bottom-color:{{ $pHex }};">Data</th></tr>
                                    </thead>
                                    <tbody>
                                        <tr><td>Row</td><td>Value</td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{-- DARK half --}}
                        @php
                            $darkBg = $currentMix['dark']['--bs-body-bg'];
                            $darkColor = $currentMix['dark']['--bs-body-color'];
                            $darkCardBg = $currentMix['dark']['--bs-card-bg'];
                            $darkBorder = $currentMix['dark']['--bs-card-border-color'];
                            $darkRgb = $lightRgb; // same RGB for opacity usage
                        @endphp
                        <div class="split-half" style="background: {{ $darkBg }}; border-left: 1px solid rgba(255,255,255,.08);">
                            <div class="split-label" style="color: {{ $darkColor }};">
                                <span class="swatch" style="display:inline-block;width:.8rem;height:.8rem;vertical-align:middle;background:{{ $pHex }};border-radius:50%;"></span>
                                🌙 {{ $pName }}
                            </div>
                            <div style="color:{{ $darkColor }};font-size:.85rem;padding:0 .25rem;">
                                <code style="font-size:.75rem;">{{ $pHex }}</code>
                                <div style="margin-top:.5rem;">
                                    <span class="demo-btn" style="background:{{ $pHex }};color:#fff;">Button</span>
                                    <span class="demo-btn" style="border:1px solid {{ $pHex }};color:{{ $pHex }};">Outline</span>
                                </div>
                                <div style="margin-top:.5rem;">
                                    <span class="primary-badge" style="background:{{ $pHex }};">Badge</span>
                                    <span class="primary-badge" style="background:rgba({{ $darkRgb }},0.15);color:{{ $pHex }};">Ghost</span>
                                    <span class="primary-link" style="color:{{ $pHex }};">Link</span>
                                </div>
                                <table class="table-sample" style="margin-top:.5rem;">
                                    <thead>
                                        <tr><th style="color:{{ $pHex }};border-bottom-color:{{ $pHex }};">Header</th><th style="color:{{ $pHex }};border-bottom-color:{{ $pHex }};">Data</th></tr>
                                    </thead>
                                    <tbody>
                                        <tr><td>Row</td><td>Value</td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    @else
        {{-- STRADE --}}
        <div class="section-title">🧭 Strade possibili</div>
        <div class="section-sub">Tre direzioni per dare più personalità all'app — scegli quella che preferisci e la sviluppiamo insieme.</div>

        <div class="row gy-0 gx-4">
            <div class="col-md-6 col-lg-4">
                <div class="strada-card">
                    <div class="strada-card-header">🔄 Mix più contrastante</div>
                    <div class="strada-card-body">
                        <p style="font-size:.85rem;color:#666;margin-bottom:1rem;">
                            Cambia abbinamento light/dark per una differenza più marcata tra i due temi.
                        </p>
                        @php
                            $contrastMixes = [
                                ['code' => 'M09', 'name' => 'Mediterraneo', 'light' => $lightPalettes['Mediterraneo'], 'dark' => $darkPalettes['Mediterraneo'], 'note' => '🌊 Blu scuro + turchese + oro'],
                                ['code' => 'M07', 'name' => 'Azzurro + Notte', 'light' => $lightPalettes['Azzurro Napoli'], 'dark' => $darkPalettes['Notte Napoli'], 'note' => '⚽ Napoli!'],
                                ['code' => 'M03', 'name' => 'Zinc + Night', 'light' => $lightPalettes['Zinc'], 'dark' => $darkPalettes['Night'], 'note' => 'Minimal → drammatico'],
                                ['code' => 'M05', 'name' => 'Slate + Night', 'light' => $lightPalettes['Slate'], 'dark' => $darkPalettes['Night'], 'note' => 'Chiaro → drammatico'],
                            ];
                        @endphp
                        @foreach ($contrastMixes as $mix)
                            <a href="?view=mix&mix={{ urlencode($mix['name']) }}" style="text-decoration:none;">
                                <div class="strada-option">
                                    <div style="display:flex;gap:3px;flex-shrink:0;">
                                        <span style="width:.8rem;height:.8rem;border-radius:50%;background:{{ $mix['light']['--bs-body-bg'] }};border:1px solid rgba(0,0,0,.1);"></span>
                                        <span style="width:.8rem;height:.8rem;border-radius:50%;background:{{ $mix['dark']['--bs-body-bg'] }};border:1px solid rgba(255,255,255,.15);"></span>
                                    </div>
                                    <div style="font-size:.85rem;">
                                        <code style="font-size:.75rem;background:rgba(0,0,0,.05);padding:.05rem .35rem;border-radius:.2rem;">{{ $mix['code'] }}</code>
                                        <strong>{{ $mix['name'] }}</strong>
                                        <div style="font-size:.75rem;color:#888;">{{ $mix['note'] }}</div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- STRADA 2: Primary più audace --}}
            <div class="col-md-6 col-lg-4">
                <div class="strada-card">
                    <div class="strada-card-header">🎯 Primary più audace</div>
                    <div class="strada-card-body">
                        <p style="font-size:.85rem;color:#666;margin-bottom:1rem;">
                            Un primary color più vivido per dare carattere — su bottoni, badge, link e header di tabella.
                        </p>
                        @php
                            $boldPrimaries = ['Violet' => '#8b5cf6', 'Emerald' => '#059669', 'Amber' => '#f59e0b', 'Rose' => '#e11d48', 'Turchese' => '#178582', 'Azzurro Napoli' => '#12A0D7'];
                        @endphp
                        @foreach ($boldPrimaries as $pName => $pHex)
                            <a href="?view=primary&mix={{ urlencode($selectedMix) }}#{{ $pName }}" style="text-decoration:none;">
                                <div class="strada-option">
                                    <span class="preview-dot" style="background:{{ $pHex }};"></span>
                                    <div style="font-size:.85rem;">
                                        <strong>{{ $pName }}</strong>
                                        <code style="font-size:.75rem;color:#888;margin-left:.5rem;">{{ $pHex }}</code>
                                    </div>
                                    <span style="margin-left:auto;display:flex;gap:2px;">
                                        <span class="demo-btn" style="background:{{ $pHex }};color:#fff;font-size:.7rem;padding:.15rem .5rem;">Btn</span>
                                        <span class="demo-btn" style="border:1px solid {{ $pHex }};color:{{ $pHex }};font-size:.7rem;padding:.15rem .5rem;">Out</span>
                                    </span>
                                </div>
                            </a>
                        @endforeach
                        <div style="margin-top:.75rem;text-align:center;">
                            <a href="?view=primary&mix={{ urlencode($selectedMix) }}" style="font-size:.8rem;">Vedi tutti e 9 i primary →</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- STRADA 3: Elementi decorativi --}}
            <div class="col-md-6 col-lg-4">
                <div class="strada-card">
                    <div class="strada-card-header">✨ Elementi decorativi</div>
                    <div class="strada-card-body">
                        <p style="font-size:.85rem;color:#666;margin-bottom:1rem;">
                            Accenti visivi extra per rendere subito riconoscibile la palette: bordo colorato, accent secondario, tabelle più definite.
                        </p>

                        {{-- Accent color picker --}}
                        <div style="font-size:.8rem;font-weight:600;margin-bottom:.5rem;">Colore d'accento:</div>
                        <div style="display:flex;gap:.5rem;margin-bottom:1rem;">
                            @foreach ($accentColors as $aName => $aHex)
                                <span style="width:1.5rem;height:1.5rem;border-radius:50%;background:{{ $aHex }};border:2px solid rgba(0,0,0,.1);cursor:default;" title="{{ $aName }} {{ $aHex }}"></span>
                            @endforeach
                        </div>

                        {{-- Card with left accent border --}}
                        <div class="accent-card accent-card-left" style="background:{{ $currentMix['light']['--bs-card-bg'] }};border-left-color:var(--bs-primary,#3b82f6);">
                            <div style="font-size:.8rem;font-weight:600;color:{{ $currentMix['light']['--bs-body-color'] }};">Card con bordo accent</div>
                            <div style="font-size:.7rem;color:#888;">Un bordo laterale colorato differenzia le card.</div>
                        </div>

                        {{-- Card with top accent border --}}
                        <div class="accent-card accent-card-top" style="background:{{ $currentMix['light']['--bs-card-bg'] }};border-top-color:var(--bs-primary,#3b82f6);">
                            <div style="font-size:.8rem;font-weight:600;color:{{ $currentMix['light']['--bs-body-color'] }};">Card con bordo top</div>
                            <div style="font-size:.7rem;color:#888;">Accentua l'header visivamente.</div>
                        </div>

                        {{-- Table variants --}}
                        <div style="font-size:.8rem;font-weight:600;margin-bottom:.35rem;margin-top:.25rem;">Header tabella:</div>
                        <table class="deco-table" style="background:{{ $currentMix['light']['--bs-card-bg'] }};">
                            <thead>
                                <tr><th style="background:rgba(var(--bs-primary-rgb,59,130,246),0.08);color:var(--bs-primary,#3b82f6);border-bottom:2px solid var(--bs-primary,#3b82f6);">Nome</th><th style="background:rgba(var(--bs-primary-rgb,59,130,246),0.08);color:var(--bs-primary,#3b82f6);border-bottom:2px solid var(--bs-primary,#3b82f6);">Valore</th></tr>
                            </thead>
                            <tbody>
                                <tr><td style="color:{{ $currentMix['light']['--bs-body-color'] }};">Esempio</td><td style="color:#888;">Descrizione</td></tr>
                            </tbody>
                        </table>

                        <div style="margin-top:.75rem;font-size:.75rem;color:#888;border-top:1px solid rgba(0,0,0,.06);padding-top:.75rem;">
                            ✅ Già implementato: tabella con header colorato, navbar con gradiente, badge tipo.
                            <br>➕ Aggiungibile: bordo accent nelle card, secondo colore d'accento (cyan/amber/violet).
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endif

    <div class="note">
        💡 <strong>Suggerimento:</strong> Digita il codice del mix che preferisci (es. <code>M05</code>, <code>M07</code>) e te lo applico al <code>app.scss</code>. Esplorali tutti nelle viste <a href="?view=single">Singole</a>, <a href="?view=mix">Mix</a>, <a href="?view=primary">Primary</a> e <a href="?view=strade">Strade</a>.
    </div>
</div>

<a href="#" class="back-top" title="Torna su">↑</a>

</body>
</html>
