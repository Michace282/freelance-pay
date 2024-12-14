/* modal*/

window.addEventListener('load', function() {

    var openModal = document.querySelectorAll('.openModal'),
        closeModal = document.querySelectorAll('.closeModal');

   openModal.forEach(function(item){

        item.addEventListener('click', function(e) {
            e.preventDefault();
            var modalId = this.getAttribute('data-modal'),
            modalElem = document.querySelector('.Modal[data-modal="' + modalId + '"]');

            modalElem.style.display = "flex";
            document.body.style.overflow = 'hidden';
        });
    });

    closeModal.forEach(function(item) {
         item.addEventListener('click', function(e) {
             e.preventDefault();
             var parent = this.closest('.Modal');
             parent.style.display = "none";
             document.body.style.overflow = 'auto';
         });
     });

    closeModal.forEach(function(item) {
        item.addEventListener('click', function(e) {
            e.preventDefault();

            if(paidButton.style.display === 'block' && !closeModalFlag) {
                alert('Ð’Ñ‹ Ð½Ðµ Ð¿Ð¾Ð´Ñ‚Ð²ÐµÑ€Ð´Ð¸Ð»Ð¸ Ð¾Ð¿Ð»Ð°Ñ‚Ñƒ Ð·Ð°ÑÐ²ÐºÐ¸. ÐÐ°Ð¶Ð¼Ð¸Ñ‚Ðµ Ð½Ð° ÐºÐ½Ð¾Ð¿ÐºÑƒ \"Ð¯ Ð¾Ð¿Ð»Ð°Ñ‚Ð¸Ð»(Ð°)\"?')
                closeModalFlag = true;
            } else {
                this.closest('.Modal').style.display = "none";
                document.body.style.overflow = 'auto';
            }
        });
    });

    window.addEventListener('click', function(e) {
        var modal = document.querySelectorAll('.Modal');
        for(i = 0; i < modal.length; i++) {
            if (e.target == modal[i]) {
                if (!modal[i].className.includes("modal__payment")) {
                    modal[i].style.display = "none";
                }
                document.body.style.overflow = 'auto';
            }
        }
    });
});

/*form valid*/

// window.addEventListener('load', function() {
//     let inputName = document.querySelector('.input__name'),
//         submitBtn = document.querySelector('.submitModBtn'),
//         alert = document.querySelector('.modal__alert');

//     submitBtn.addEventListener('click', function() {
//         if (inputName.validity.valid == false) {
//             alert.style.display = "block";
//             inputName.classList.add('invalid');
//         }
//     });
// });