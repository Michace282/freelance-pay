window.addEventListener('load', function() {
    let menuUser = document.querySelector('.headerNav__drop'),
    menuBtnUser = document.querySelector('.btn__drop'),
    imgRotate = document.querySelector('.headerNav__arrow');

        menuBtnUser.addEventListener('click', menuOpen);

        function menuOpen() {
            menuUser.classList.toggle('active__drop');
            imgRotate.classList.toggle('rotate__img');
        }
});
