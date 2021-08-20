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
                <p class="news-info__text"><?=$field['text']?></p>
                <? if(isset($field['imgHd'])): ?>
                    <a class="btn btn-hd-foto" href="<?='/'.$field['imgHd']?>" target="blanck">HD фото</a>
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
