<?php
if(!$_COOKIE['planet']) {
  header('Location: /index.php');
  die();
}
require_once '../db.php';
require_once '../header.php';
$planets = $dbh->query("SELECT * FROM `planets`");

?>
<section class="promo <?=$_COOKIE['planet']?>" data-name="planets">
  <div class="container">
    <h1 class="promo__header"><?=$_COOKIE['planet']?></h1>
<!--    <div class="quote">-->
<!--      <h3 class="quote__text">"Космос вовсе не далек. До него всего час езды — при условии, что твоя машина может ехать вертикально вверх."</h3>-->
<!--      <p class="quote__author" title="Сэр Фред Хойл — известный британский астроном и космолог.">сэр Фред Хойл</p>-->
<!--    </div>-->
  </div>
</section>
<section class="description">
    <div class="container">
      <? foreach ($planets as $planet):
        if ($_COOKIE['planet'] == $planet['nameEng']): ?>
          <h2 class="description__header" id="<?=$planet['nameEng']?>"><?=$planet['nameRus']?></h2>
          <p class="description__text">
              <?=$planet['description']?> <a class="description__text__link" href="<?=$planet['wikiLink']?>" target="_blank">Wikipedia</a>
          </p>
      <? endif;?>
      <? endforeach;?>
    </div>
</section>

<?php
require_once '../footer.php';
?>
