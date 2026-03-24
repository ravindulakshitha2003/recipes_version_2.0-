// Theme Toggle System
document.addEventListener('DOMContentLoaded', () => {
    const html = document.documentElement;
    const toggleBtn = document.getElementById('theme-toggle-btn');
    
    // Get saved theme preference or default to dark mode
    const savedTheme = localStorage.getItem('theme') || 'dark';
    
    // Set initial theme
    setTheme(savedTheme);
    
    // Theme toggle button click handler
    if (toggleBtn) {
        toggleBtn.addEventListener('click', () => {
            const currentTheme = html.getAttribute('data-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            setTheme(newTheme);
        });
    }
    
    function setTheme(theme) {
        html.setAttribute('data-theme', theme);
        localStorage.setItem('theme', theme);
        
        // Update toggle button icon
        if (toggleBtn) {
            const icon = toggleBtn.querySelector('i');
            if (icon) {
                if (theme === 'dark') {
                    icon.classList.remove('fa-sun');
                    icon.classList.add('fa-moon');
                    toggleBtn.title = 'Switch to Light Mode';
                } else {
                    icon.classList.remove('fa-moon');
                    icon.classList.add('fa-sun');
                    toggleBtn.title = 'Switch to Dark Mode';
                }
            }
        }
    }
});
