<?php

require_once '../db.php';
$choice = $_GET['id'];

$currentNews = $dbh->query("SELECT * FROM `news` WHERE id=$choice")->fetchAll();

?>

<div class="news-info">
    <? foreach ($currentNews as $field): ?>
    <h2 class="news-info__header"><?=$field['title']?></h2>
    <img class="news-info__img" src="<?
        preg_match('~^img/news/small/\w+(-{0,1})\w+.(jpg|jpeg|png)$~', "{$field['imgSmall']}", $matches);
        if($matches) {
            echo '/'.$field['imgSmall'];
        } else {
            echo '/img/news/default.jpg';
        }
    ?>" width="800" height="500" alt="<?=$field['description']?>">
    <p class="news-info__date"><?=date("d-m-Y", strtotime($field['date']))?></p>
    <p class="news-info__text"><?=$field['text']?></p>
    <?endforeach;?>
    <a class="btn btn-info back" >Назад</a>
</div>
