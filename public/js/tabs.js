window.addEventListener('load', function() {
    let tabTitle = document.querySelectorAll('.tab__title'),
        tabContent = document.querySelectorAll('.tab-content'),
        countTitle = tabTitle.length,
        countContent = tabContent.length;

    // Tabs switch

        tabTitle.forEach(function(item) {
            item.addEventListener('click', showContent);

            function showContent(e) {
                e.preventDefault();
                for(i = 0; i < countTitle; i++){
                    tabTitle[i].classList.remove('active__tab');
                }
                for(i = 0; i < countContent; i++){
                    tabContent[i].style.display = 'none';
                }
                var tabId = this.getAttribute('data-tab');
                this.classList.add('active__tab');

                tabContentActive = document.querySelector('.tab-content[data-tab="' + tabId + '"]');
                tabContentActive.style.display = "block";
                let items = tabContentActive.querySelectorAll('.stepItems__item');
                for(i = 0; i < items.length; i++){
                    items[i].classList.remove('activeItem');
                    items[i].querySelector('.item__open').style.display = 'none';
                }
               items[0].classList.toggle('activeItem');
               items[0].querySelector('.item__open').style.display = 'block';
            }
        });
});