'use strict';

const forms = document.querySelectorAll('.edit-list form');

forms.forEach(form => {
    form.addEventListener('submit', (e) => {
        let answer = confirm('Удалить новость?');
        if(!answer) {
            e.preventDefault();
        }
    });
})