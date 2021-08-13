'use strict';
    const checkFunc = str => {
        str = str.trim();
        str = str.replace(/ {2,}/g, ' ');
        str = str.replace(/-{2,}/g, '-');
        return str;
    };

    const checkHyphenSpace = str => {
        str = str.trim();
        str = str.replace(/^-*/, '');
        str = str.replace(/-*$/, '');
        return str;
    };

    try {
        const form = document.getElementById('form-add'),
            textareas = form.querySelectorAll('textarea'),
            inputs = [...form.querySelectorAll('input')];

        inputs.length = 3;

        textareas.forEach(item => {
            item.addEventListener('input', () => {
                console.log(1)

                if (item.value.length < 2) {
                    item.setCustomValidity('Слишком короткая запись!'); //ДОДЕЛАТЬ!
                } else {
                    item.setCustomValidity('');
                }
                item.onblur = () => {
                    item.value = checkFunc(checkHyphenSpace(item.value));

                };
            });
        });
        console.log(form);
        console.log(inputs);
        console.log(textareas);
        form.addEventListener('submit', function (e) {


            e.preventDefault();
        })
    } catch (e) {
        console.error('Ошибка в прверке инпутов', e);
    }




