<?php
require_once '../../../db.php';
require_once '../../../header.php';


$planets = $dbh->query("SELECT * FROM `planets`");

?>

<main class="main">
  <section class="promo planets" data-name="Солнечная система - планеты">
    <div class="container">
      <h1 class="promo__header">solar system - planets</h1>
      <!-- <div class="quote">
        <blockquote cite="https://ru.wikipedia.org/wiki/%D0%A5%D0%BE%D0%B9%D0%BB,_%D0%A4%D1%80%D0%B5%D0%B4" class="quote__text">"Космос вовсе не далек. До него всего час езды — при условии, что твоя машина может ехать вертикально вверх."</blockquote>
        <p class="quote__author" title="Сэр Фред Хойл — известный британский астроном и космолог.">сэр Фред Хойл</p>
      </div> -->
    </div>
    <div class="planets-wrapper">
        <div class="planet-icon sun">
            <img class="icons-planets mars" src="<?='/img/planets/icons/sun.png';?>" alt="солнце">
        </div>

        <? foreach ($planets as $planet):?>
        <div class="planet-icon <?=$planet['nameEng']?>">
            <a class="planet-link" href="<?='details.php?planet='.$planet['nameEng'].'&id='.$planet['id'];?>"><img class="icons-planets mars" src="<?='/img/planets/icons/'.$planet['nameEng'].'.png';?>" alt="<?=$planet['nameRus']?>"></a>
        </div>
        <? endforeach;?>

    </div>


  </section>
</main>

<?php
require_once '../../../footer.php';
?>
