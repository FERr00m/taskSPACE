<?php
require_once 'header.php';
?>
<main class="main">
  <section class="promo main" data-name="space - сайт о космосе">
    <div class="container">
      <h1 class="promo__header">SPACE</h1>
      <div class="quote">
        <blockquote cite="https://ru.wikipedia.org/wiki/%D0%A5%D0%BE%D0%B9%D0%BB,_%D0%A4%D1%80%D0%B5%D0%B4" class="quote__text">"Космос вовсе не далек. До него всего час езды — при условии, что твоя машина может ехать вертикально вверх."</blockquote>
        <p class="quote__author" title="Сэр Фред Хойл — известный британский астроном и космолог.">сэр Фред Хойл</p>
      </div>
    </div>
  </section>

  <section class="nasa-apod">
    <div class="container">
      <div class="nasa-header-wrapper">
        <a class="nasa-link" href="https://www.nasa.gov/" rel="nofollow, noopener" target="blank"><img src="<?='/img/nasa/nasaLogo.svg'?>" width="80" height="80" alt="nasa-logo"></a>
        <h2 class="nasa-apod__header">APOD<span>Один из самых популярных веб-сайтов НАСА - <a class="nasa-apod-link" href="https://apod.nasa.gov/apod/astropix.html" rel="nofollow, noopener" target="blank">Astronomy Picture of the Day</a>. Фактически, этот сайт - один из самых популярных во всех федеральных агентствах.</span></h2>
      </div>
      <div class="apod-info">
        <div class="apod-figure-wrapper">
          <figure class="apod-figure">
              <img class="apod-info__img" src="#"
                  alt="alt"
                  width="512"
                  height="288"
                  loading="lazy" >
              <figcaption class="apod-info__header"></figcaption>
          </figure>
          <p class="apod-author"></p>
        </div>

        <div class="apod-description-wrapper">
          <p class="apod-info__date"></p>
          <p class="apod-info__text"></p>
          <a class="btn btn-hd-foto" href="" rel="nofollow, noopener" target="blank">HD фото</a>
        </div>
      </div>

    </div>
  </section>
<!--  <div class="flexslider" style="width: 300px">-->
<!--    <ul class="slides">-->
<!--      <li>-->
<!--        <img width="300" height="300" src="img/logo.png" />-->
<!--      </li>-->
<!--      <li>-->
<!--        <img width="300" height="300" src="img/logo.png" />-->
<!--      </li>-->
<!--      <li>-->
<!--        <img width="300" height="300" src="img/logo.png" />-->
<!--      </li>-->
<!---->
<!--    </ul>-->
<!--  </div>-->
</main>

<script src="<?='/api/nasa/apod.js'?>"></script>

<?php
require_once 'footer.php';
?>
