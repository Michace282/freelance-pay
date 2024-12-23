window.addEventListener('load', function() {
    let back = document.querySelector('.back');

    back.addEventListener('click', function(e) {
        e.preventDefault();
        window.history.back();
    });
});