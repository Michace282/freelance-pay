window.addEventListener('load', function() {

    let offset = 0;
    const slidesLine = document.querySelector('.slides'),
         slides = document.querySelectorAll('.slide'),
         controlBtns = document.querySelectorAll('.sliderControl'),
         leftBtn = document.querySelector('.sliderControl__left'),
         rightBtn = document.querySelector('.sliderControl__right'),
        
         count = slides.length,
         slidesLineWidth = (slides[1].offsetWidth + 30)*count,
         step = slides[1].offsetWidth + 30;

    controlBtns.forEach(function(button){
        button.addEventListener('click', function(e){
            if(e.target.className ==='sliderControl__right'){
                offset += step;
                if (offset >= slidesLineWidth) {
                    offset = slidesLineWidth - step;
                } 
                slidesLine.style.left = -offset +'px';
                sliderButtons();
            } else if(e.target.className ==='sliderControl__left'){
                offset -= step;
                if(offset < 0) {
                    offset = 0;
                }
                slidesLine.style.left = -offset +'px';
                sliderButtons();
            }
        });
    });

    const sliderButtons = () => {
        if (offset == 0) {
            leftBtn.style.opacity = 0.3;
        } else {
            leftBtn.style.opacity = 1;
        }
        if (offset == slidesLineWidth - step) {
            rightBtn.style.opacity = 0.3;
        } else {
            rightBtn.style.opacity = 1;
        }
    };
    sliderButtons();
});