<?php
require_once '../header.php';
$choice = $_GET['id'];

$currentNews = $dbh->query("SELECT * FROM `news` WHERE id=$choice")->fetchAll();
?>

<main class="main">
    <section class="news-list promo news-details" data-name="<?=$currentNews[0]['title']?>">
        <div class="container">
            <hr class="hr-news-details">

            <div class="news-info">
            <h1 class="news-list__header"><?=$currentNews[0]['title']?></h1>
            <? foreach ($currentNews as $field): ?>
                <img class="news-info__img" src="<?
                    preg_match('~^img/news/\w+(-{0,1})\w+.(jpg|jpeg|png)$~', "{$field['imgFull']}", $matches);
                    if($matches) {
                        echo '/'.$field['imgFull'];
                    } else {
                        echo '/img/news/default.jpg';
                    }
                ?>" width="1024" height="576" alt="<?=$field['description']?>">
                <p class="news-info__date"><?=date("d-m-Y", strtotime($field['date']))?></p>
                <? if ($field['sourceLink'] && !$field['authorLink']):?>
                <div class="news-info__copyright">
                    <a href="<?=$field['sourceLink']?>"
                        rel="nofollow, noopener"
                        target="blank"
                        class="news-info__source"><?=$field['sourceName']?></a>
                </div>

                <? elseif ($field['authorLink'] && $field['sourceLink']):?>
                    <div class="news-info__copyright">
                    <span>Источник: </span><a href="<?=$field['sourceLink']?>"
                        rel="nofollow, noopener"
                        target="blank"
                        class="news-info__source"><?=$field['sourceName']?></a>
                    <span>Автор: </span><a href="<?=$field['authorLink']?>"
                        class="news-info__author-name"
                        rel="nofollow, noopener"
                        target="blank"><?=$field['authorName']?></a>
                    </div>

                <? endif;?>
                <p class="news-info__text"><?=$field['text']?></p>


                <? if(isset($field['imgHd'])): ?>
                    <a class="btn btn-hd-foto" href="<?='/'.$field['imgHd']?>" target="blank">HD фото</a>
                <? endif;?>
                <?endforeach;?>
                <button class="btn btn-info back">Назад</button>
            </div>
            <hr class="hr-news-details">

        </div>

    </section>

</main>
<?php
require_once '../footer.php';
?>
