<?php
if(!$_GET['planet'] || !$_GET['id']) {
  header('Location: ./');
  die();
}
require_once '../../../db.php';
require_once '../../../header.php';

$planets = $dbh->query("SELECT * FROM `planets`");
$previusPlanetID =  $_GET['id'] - 1;
$nextPlanetID =  $_GET['id'] + 1;
$currentPlanet;
$previusPlanet;
$nextPlanet;

foreach ($planets as $planet) {
  if($planet['nameEng'] == $_GET['planet']) {
    $currentPlanet = $planet;
  } elseif($planet['id'] == $previusPlanetID && $planet['id'] > 0) {
    $previusPlanet = $planet;
  } elseif($planet['id'] == $nextPlanetID && $planet['id'] <= 8) {
    $nextPlanet = $planet;
  }
}
// echo print_r($currentPlanet) . '<br>';
// echo print_r($nextPlanet) . '<br>';
// echo print_r($previusPlanet) . '<br>';

?>
<main>
  <section class="promo <?=$currentPlanet['nameEng']?>" data-name="Планеты Солнечной системы - <?=ucfirst($currentPlanet['nameRus'])?>">
    <div class="container">
      <h1 class="promo__header"><?=$currentPlanet['nameEng']?></h1>
    </div>
  </section>
  <section class="description">
    <div class="container">
      <h2 class="description__header" id="<?=$currentPlanet['nameEng']?>"><?=$currentPlanet['nameRus']?></h2>
      <p class="description__text">
          <?=$currentPlanet['description']?> <a class="description__text__link" rel="nofollow, noopener" href="<?=$currentPlanet['wikiLink']?>" target="blank">Wikipedia</a>
      </p>

      <div class="planets-navigation">
        <?if(isset($previusPlanet)):?>
          <div class="planets-link-wrapper">
            <a class="btn-planets-nav previus" href="<?='details.php?planet='.$previusPlanet['nameEng'].'&id='.$previusPlanet['id'];?>"><?=$previusPlanet['nameRus']?></a>
          </div>

        <?endif?>
        <?if(isset($nextPlanet)):?>
          <div class="planets-link-wrapper">
            <a class="btn-planets-nav next" href="<?='details.php?planet='.$nextPlanet['nameEng'].'&id='.$nextPlanet['id'];?>"><?=$nextPlanet['nameRus']?></a>
          </div>
        <?endif?>
      </div>
      <a class="btn btn-info planets-back" href="<?='./';?>">Назад</a>

    </div>
  </section>
  <?/*<section class="slider">
    <div class="flexslider">
        <ul class="slides">
            <li>
                <img src="images/img1.jpg" />
            </li>
            <li>
                <img src="images/img2.jpg" />
            </li>
            <li>
                <img src="images/img3.jpg" />
            </li>
            <li>
                <img src="images/img4.jpg" />
            </li>
        </ul>
    </div>
</section>*/?>
</main>

<?php
require_once '../../../footer.php';
?>
