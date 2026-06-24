(function() {
    var html = document.documentElement;
    var saved = localStorage.getItem('theme');
    var theme = saved || 'light';
    html.setAttribute('data-bs-theme', theme);

    document.addEventListener('DOMContentLoaded', function() {
        var toggle = document.getElementById('themeToggle');
        var icon = document.getElementById('themeIcon');
        if (!toggle || !icon) return;

        function toggleTheme() {
            var current = html.getAttribute('data-bs-theme');
            var next = current === 'dark' ? 'light' : 'dark';
            html.setAttribute('data-bs-theme', next);
            localStorage.setItem('theme', next);
            updateTheme(next);
        }

        function updateTheme(t) {
            icon.className = t === 'dark' ? 'bi bi-moon-fill' : 'bi bi-sun-fill';
        }
        updateTheme(theme);

        toggle.addEventListener('click', toggleTheme);
    });
})();
