<?php
require_once '../../../db.php';
require_once '../../../header.php';


$planets = $dbh->query("SELECT * FROM `planets`");

?>

<main class="main">
  <section class="promo planets" data-name="Солнечная система - планеты">
    <div class="container">
      <h1 class="promo__header">solar system - planets</h1>
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
<?php
require_once ROOT.'/footer.php';
?>
