window.addEventListener('load', function() {
    let menu = document.querySelector('.headerNav__menu'),
        menuBtn = document.querySelector('.Nav__menu__img');

    menuBtn.addEventListener('click', menuOpen);

    function menuOpen(e) {
        e.preventDefault();
        menu.classList.toggle('d-none');
        menu.classList.toggle('d-flex');
        menu.classList.add('mobile');
        menu.classList.toggle('active');
        menuBtn.classList.toggle('active__lines');
    }
});