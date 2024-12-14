window.addEventListener('load', function() {
    themeChanger(theme);
    let changeThemeButtons = document.querySelectorAll('.changeTheme');

    changeThemeButtons.forEach(button => {
        button.addEventListener('click', function () {
            let theme = this.dataset.theme;
            themeChanger(theme);
        });
    });
});
themeChanger(theme);