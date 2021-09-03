'use strict';

const apiKey = 'api_key=NIg2ZhLbv1benmQtBGh9fqv9U4mX3pwazzdih6Y6',
    url = 'https://api.nasa.gov/planetary/apod?';

const checkForError = response => {   // Функция для сокращения кода
    if (!response.ok) throw Error(response.statusText);
    return response.json();
    };

const defaultDataObj = {
    "copyright": "Space",
    "date": new Date(),
    "explanation": "Это поисходит потому что превышен лимит запросов на сервер сайта NASA (Счетчик обновляется каждый час) или что-то пошло не так... Заходите позже :)",
    "hdurl": "/img/news/default.jpg",
    "title": "Новая картинка пока недоступна",
    "url": "/img/news/default.jpg"
}

const setDataApod = (data = defaultDataObj) => {
    const apodInfo = document.querySelector('.apod-info'),
        apodInfoHeader = apodInfo.querySelector('.apod-info__header'),
        apodInfoHeaderVideo = apodInfo.querySelector('.apod-info-video-header'),
        apodInfoImg = apodInfo.querySelector('.apod-info__img'),
        apodInfoVideo = apodInfo.querySelector('.apod-info__video'),
        apodIframeWrapper = apodInfo.querySelector('.iframe-wrapper'),
        apodInfoFig = apodInfo.querySelector('.apod-figure'),
        apodAuthor = apodInfo.querySelector('.apod-author'),
        apodInfoDate = apodInfo.querySelector('.apod-info__date'),
        apodInfoText = apodInfo.querySelector('.apod-info__text'),
        btnHdFoto = apodInfo.querySelector('.btn-hd-foto');

    try {
        apodInfoHeader.textContent = data['title'];
        if (data['media_type'] !== 'video') {
            apodIframeWrapper.style.display = 'none';
            apodInfoImg.setAttribute('src', data['url']);
            apodInfoImg.setAttribute('alt', data['title']);
        } else {
            apodInfoFig.style.display = 'none';
            apodAuthor.style.display = 'none';
            btnHdFoto.style.display = 'none';
            apodInfoHeaderVideo.textContent = data['title'];
            apodInfoVideo.style.display = 'block';
            apodInfoVideo.setAttribute('src', data['url']);
        }

        if (data['copyright']) {
            data['copyright'].length > 50 ?  apodAuthor.style.fontSize = '15px' : true;
        }

        data['copyright'] ? apodAuthor.textContent = data['copyright'] : apodAuthor.textContent = defaultDataObj['copyright'];
        apodInfoDate.textContent = new Date(data['date']).toLocaleDateString();
        apodInfoText.textContent = data['explanation'];
        btnHdFoto.setAttribute('href', data['hdurl']);

    } catch (error) {
        console.error('Ошибка в обработчике объекта', error)
    }

}


fetch(`${url}${apiKey}`)
    .then(checkForError)
    .then(data => {
        //console.log(data);
        setDataApod(data);
    })
    .catch(error => {
        console.error("error", error);
        setDataApod();
});
