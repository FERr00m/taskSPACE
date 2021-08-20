'use strict';

/**
 * Редактирование строки удаление большого количества пробелов и
 * замена первой буквы на заглавную
 * @param str Строка для проверки
 * @returns {string}
 */
const checkFunc = str => {
    str = str.trim();
    str = str.replace(/ {2,}/g, ' ');
    str = str.replace(/-{2,}/g, '-');
    if (str !== '') {
        str = str[0].toUpperCase() + str.slice(1);
    }
    return str;
};

/**
 * Редактирование строки удаление большого количества знака "-"
 * @param str Строка для проверки
 * @returns {string}
 */
const checkHyphenSpace = str => {
    str = str.trim();
    str = str.replace(/^-*/, '');
    str = str.replace(/-*$/, '');
    return str;
};

/**
 * Проверка объекта на ниличие ключа false
 * @param obj Объект для проверки
 * @returns {boolean}
 */
const checkObj = (obj) => {
        let result = true;
        for (let key in obj) {
            if(!obj[key]['isValid']) {
                result = false;
                return result;
            }
        }
        return result;
}

    try {
        const form = document.getElementById('form-add'),
            textareas = form.querySelectorAll('textarea'),
            inputsText = [...form.querySelectorAll('input[type="text"]')],
            canSubmit = {
                'title': {
                    'name': 'Заголовок',
                    'isValid': false
                },
                'description': {
                    'name': 'Краткое описание',
                    'isValid': false
                },
                'text': {
                    'name': 'Текст',
                    'isValid': false
                },
                'imgFull': {
                    'name': 'Путь до большого фото',
                    'isValid': true
                },
                'imgSmall': {
                    'name': 'Путь до маленького фото',
                    'isValid': true
                },
                'date': {
                    'name': 'Дата публикации',
                    'isValid': true
                },
            };

        // Validate textareas
        textareas.forEach(item => {
            item.addEventListener('blur', () => {
                item.value = checkFunc(checkHyphenSpace(item.value));
                let p = form.querySelector(`.add-alert-${item.id}`);
                if (item.value.length < 3) {
                    p.innerText = ('Слишком короткое значение!');
                    p.style.display = 'block';
                    canSubmit[item.id]['isValid'] = false;
                } else {
                    p.innerText = '';
                    p.style.display = 'none';
                    canSubmit[item.id]['isValid'] = true;
                }
            });
            // Вывод количества символов в textarea
            item.addEventListener('input', () => {
                let span = form.querySelector(`.symbols-length-${item.id}`);
                span.textContent = item.value.length;
            });
        });

        form.addEventListener('submit', function (e) {
            if (!checkObj(canSubmit)) {
                e.preventDefault();
                let alertFormP = this.querySelector('.add-alert-form');

                alertFormP.innerHTML = `Необходимо заполнить: <br>`;
                for (let key in canSubmit) {
                    if(!canSubmit[key]['isValid']) {
                        alertFormP.insertAdjacentHTML('beforeend', `<span>${canSubmit[key]['name']}</span> <br>`);
                    }
                }
                alertFormP.style.display = 'block';
            }
        })
    } catch (e) {
        console.error('Ошибка в проверке инпутов', e);
    }
