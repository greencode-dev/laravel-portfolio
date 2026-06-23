(function() {
    var html = document.documentElement;
    var saved = localStorage.getItem('theme');
    var theme = saved || 'light';
    html.setAttribute('data-bs-theme', theme);

    document.addEventListener('DOMContentLoaded', function() {
        var toggle = document.getElementById('themeToggle');
        var icon = document.getElementById('themeIcon');
        if (!toggle || !icon) return;

        var label = document.getElementById('themeLabel');

        function toggleTheme() {
            var current = html.getAttribute('data-bs-theme');
            var next = current === 'dark' ? 'light' : 'dark';
            html.setAttribute('data-bs-theme', next);
            localStorage.setItem('theme', next);
            updateTheme(next);
        }

        function updateTheme(t) {
            icon.className = t === 'dark' ? 'fa-solid fa-toggle-on' : 'fa-solid fa-toggle-off';
            if (label) label.textContent = t === 'dark' ? 'Tema scuro' : 'Tema chiaro';
        }
        updateTheme(theme);

        toggle.addEventListener('click', toggleTheme);
        if (label) label.addEventListener('click', toggleTheme);
    });
})();
