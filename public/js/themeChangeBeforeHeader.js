function themeChanger(theme) {
    if (theme === 'light') {
        document.getElementById('id_theme_dark').href = "";
        document.querySelector(`[data-theme="light"]`).style.display = 'none';
        document.querySelector(`[data-theme="dark"]`).style.display = 'block';
    } else if (theme === 'dark') {
        document.getElementById('id_theme_dark').href = "/css/style-dark.css";
        document.querySelector(`[data-theme="light"]`).style.display = 'block';
        document.querySelector(`[data-theme="dark"]`).style.display = 'none';
    }
    localStorage.setItem('theme', theme);
}
let theme = localStorage.getItem('theme') || 'light';
themeChanger(theme);
