<?php
require_once '../db.php';
require_once '../header.php';
$planets = $dbh->query("SELECT * FROM `planets`");

?>
<section class="promo " data-name="Раздел о планетах - Space">
  <div class="container">
    <h1 class="promo__header">Планеты</h1>
  </div>
</section>
<section class="description">
    <div class="container">
        <img class="icons-planets mars" width="100" height="100" src="<?='/img/planets/icons/mars.png';?>" alt="">
        <img class="icons-planets mars" width="100" height="100" src="<?='/img/planets/icons/mercury.png';?>" alt="">
    </div>
</section>

<?php
require_once '../footer.php';
?>
