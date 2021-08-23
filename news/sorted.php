<?php
require_once '../db.php';

if ($_GET['sort'] == 'old') {
  $news = $dbh->query("SELECT * FROM `news` ORDER BY `news`.`date` ASC");
} elseif ($_GET['sort'] == 'new') {
  $news = $dbh->query("SELECT * FROM `news` ORDER BY `news`.`date` DESC");
}

?>
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
    ?>" height="180" alt="<?=$item['title']?>">
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
