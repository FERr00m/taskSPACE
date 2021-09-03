'use strict';
window.scrollBy(0, 1);
let boxes = document.querySelectorAll('.box');
function checkBoxes(boxes = null) {
    boxes === null ? boxes = document.querySelectorAll('.box') : boxes;
    const triggerBottom = (window.innerHeight / 5 * 4);
    boxes.forEach(box => {
        const boxTop = box.getBoundingClientRect().top;

        if(boxTop < triggerBottom) {
        box.classList.add('show');
        } else {
        box.classList.remove('show');
        }
    })
}

document.addEventListener('scroll', () => {
    checkBoxes();

})
