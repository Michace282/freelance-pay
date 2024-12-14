window.addEventListener('load', function() {
    const blocks = document.querySelectorAll('.stepItems__item'),
          openBtns = document.querySelectorAll('.block__open');

    blocks.forEach(function(block) {
      const itemOpen = block.querySelector('.item__open');
  
      if (!block.classList.contains('activeItem')) {
            itemOpen.style.display = 'none';
      }
    });
  
    openBtns.forEach(function(openBtn) {
      openBtn.addEventListener('click', function(e) {
        e.preventDefault();

        const block = openBtn.parentElement,
              itemOpen = block.querySelector('.item__open');
  
        // close all open items
        blocks.forEach(function(b) {
          const iOpen = b.querySelector('.item__open');
          if (b.classList.contains('activeItem')) {
            iOpen.style.display = 'none';
            b.classList.remove('activeItem');
          }
        });
  
        if (itemOpen.style.display === 'none') {
          itemOpen.style.display = 'block';
          block.classList.add('activeItem');
        } else {
          itemOpen.style.display = 'none';
          block.classList.remove('activeItem');
        }

      });
    });
  });