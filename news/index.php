<?php
require_once '../header.php';
require_once '../db.php';

$news = $dbh->query("SELECT * FROM `news` ORDER BY `news`.`date` DESC");

?>

<main class="main">
    <section class="promo news" data-name="Новости про космос - Space">
        <div class="container">
            <p class="promo__header">NEWS</p>
            <?//<a href="<?='/'.getRoot(__FILE__)">ssss</a> Доработать?>

            <div class="quote">
                <blockquote cite="https://ru.wikipedia.org/wiki/%D0%A1%D0%B0%D0%B3%D0%B0%D0%BD,_%D0%9A%D0%B0%D1%80%D0%BB" class="quote__text">"Перед лицом Космоса большинство людских дел выглядят незначительными, даже пустячными."</blockquote>
                <p class="quote__author" title="Сэр Фред Хойл — известный британский астроном и космолог.">Карл Саган</p>
            </div>
        </div>
    </section>
    <section class="news-list">
      <div class="container" id="result">
        <div class="loader-news">
          <img width="80" height="80" src="<?='/img/news/loaderSort.svg'?>" alt="loader-news">
        </div>
        <h1 class="news-list__header">Новости Космоса</h1>
          <div class="sort-news dropdown">
            <select class="btn btn-secondary" name="sort-news" id="sort-news-select">
              <option value="new" selected>Сначала новые</option>
              <option value="old">Сначала старые</option>
            </select>
          </div>
          <div class="result" >
              <div class="news-list__items">
                  <? foreach ($news as $item): ?>
                    <div class="card">
                      <div class="card-img-top">
                        <img src="<?
                          preg_match('~^img/news/small/\w+(-{0,1})\w+.(jpg|jpeg|png)$~', "{$item['imgSmall']}", $matches);
                          if($matches) {
                            echo '/'.$item['imgSmall'];
                          } else {
                            echo '/img/news/default.jpg';
                          }
                        ?>" height="180" loading="lazy" alt="<?=$item['title']?>">
                      </div>
                      <div class="card-body">
                        <h5 class="card-title"><?=$item['title']?></h5>
                        <p class="card-text"><?=$item['description']?></p>
                        <div class="card-more">
                          <a href="<?='/news/details.php?id='.$item['id']?>" class="btn btn-info more-news" id="<?=$item['id']?>">Подробнее</a>
                          <? if ($_COOKIE['user'] == 'admin'):?>
                            <div id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" data-name="admin-links" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                ADMIN
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="<?='/admin/editNews/index.php#form'.$item['id']?>" id="">EDIT</a></li>
                                <li><a class="dropdown-item" href="<?='/admin/deleteNews/index.php#form'.$item['id']?>" id="">DEL</a></li>
                              </ul>
                            </li>
                            </ul>
                            </div>
                            <? else:?>
                              <p class="card-more__date"><?=date("d-m-Y", strtotime($item['date']))?></p>
                            <? endif;?>
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
