window.addEventListener('load', function() {
    let btn = document.querySelector('.btn-order'),
    orderBlock = document.querySelector('.orderBlock');


        btn.addEventListener('click', blockOpen);

        function blockOpen(e) {
            e.preventDefault();
            orderBlock.classList.toggle('d-none'); 
        }
});