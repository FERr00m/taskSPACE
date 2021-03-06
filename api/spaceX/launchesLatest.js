'use strict';

const urlSpaceX = 'https://api.spacexdata.com/v4/dragons';

// const checkForError = response => {   // Функция для сокращения кода
//     if (!response.ok) throw Error(response.statusText);
//     return response.json();
//     };

// const defaultDataObj = {
//     "copyright": "Space",
//     "date": new Date(),
//     "explanation": "Это поисходит потому что превышен лимит запросов на сервер сайта NASA (Счетчик обновляется каждый час) или что-то пошло не так... Заходите позже :)",
//     "hdurl": "/img/news/default.jpg",
//     "title": "Новая картинка пока недоступна",
//     "url": "/img/news/default.jpg"
// }

// const setDataApod = (data = defaultDataObj) => {
//     const apodInfo = document.querySelector('.apod-info'),
//         apodInfoHeader = apodInfo.querySelector('.apod-info__header'),
//         apodInfoImg = apodInfo.querySelector('.apod-info__img'),
//         apodAuthor = apodInfo.querySelector('.apod-author'),
//         apodInfoDate = apodInfo.querySelector('.apod-info__date'),
//         apodInfoText = apodInfo.querySelector('.apod-info__text'),
//         btnHdFoto = apodInfo.querySelector('.btn-hd-foto');

//     try {
//         apodInfoHeader.textContent = data['title'];
//         apodInfoImg.setAttribute('src', data['url']);
//         apodInfoImg.setAttribute('alt', data['title']);
//         apodAuthor.textContent = data['copyright'];
//         apodInfoDate.textContent = new Date(data['date']).toLocaleDateString();
//         apodInfoText.textContent = data['explanation'];
//         btnHdFoto.setAttribute('href', data['hdurl']);

//     } catch (error) {
//         console.error('Ошибка в обработчике объекта', error)
//     }

// }

fetch(`${urlSpaceX}`)
    .then(checkForError)
    .then(data => {
        console.log(data);
    })
    .catch(error => {
        console.log("error", error);

});
