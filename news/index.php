<?php
require_once '../header.php';
require_once '../db.php';

$news = $dbh->query("SELECT * FROM `news`");

?>

<main class="main">
    <section class="promo news" data-name="news">
        <div class="container">
            <h1 class="promo__header">NEWS</h1>
            <div class="quote">
                <h3 class="quote__text">"Перед лицом Космоса большинство людских дел выглядят незначительными, даже пустячными."</h3>
                <p class="quote__author" title="Сэр Фред Хойл — известный британский астроном и космолог.">Карл Саган</p>
            </div>
        </div>
    </section>
    <section class="news-list">
      <div class="container" id="result">
        <h2 class="news-list__header">Новости</h2>
          <div class="result" >
              <div class="news-list__items">
                  <? foreach ($news as $item): ?>
                    <div class="card">
                      <img src="<?='/'.$item['imgSmall']?>" width="320" height="180" class="card-img-top" alt="<?=$item['title']?>">
                      <div class="card-body">
                        <h5 class="card-title"><?=$item['title']?></h5>
                        <p class="card-text"><?=$item['description']?></p>
                        <div class="card-more">
                          <a href="#result" class="btn btn-info more-news" id="<?=$item['id']?>">Подробнее</a>
                          <p class="card-more__date"><?=date("d-m-Y", strtotime($item['date']))?></p>
                        </div>

                      </div>
                    </div>
                  <? endforeach;?>
              </div>
          </div>
      </div>

    </section>
</main>

<?php
require_once '../footer.php';
?>
