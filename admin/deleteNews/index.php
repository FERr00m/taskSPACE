<?php
session_start();

if (!$_SESSION['login'] || !$_SESSION['password'] || $_COOKIE['user'] != 'admin') {
    setcookie('user', null, -1, '/');
    session_destroy();
    header('Location: ../../login.php');
    die();
} else {

    require_once '../../db.php';
    require_once '../../header.php';

    $news = $dbh->query("SELECT * FROM `news`");

    //unlink(ROOT . '/img/news/free.png');

}
?>

<main class="main">
    <section class="promo delete-news" data-name="delete news">
        <div class="container">
            <h1 class="promo__header">DELETE NEWS</h1>
        </div>
    </section>

    <section class="edit-list">
        <h2 class="admin-list__header">Удаление</h2>

        <div class="container edit-list-body">
            <a class="btn btn-info edit-back" href="<?='../index.php'?>">Назад</a>
            <? foreach ($news as $item): ?>
                <div class="card card-admin">
                    <form action="handler.php" method="post" id="form<?=$item['id']?>">
                        <p class="edit-list-item-par">Новость id - <?=$item['id']?><input class="d-none" name="id" value="<?=$item['id']?>"></p>
                        <label for="title<?=$item['id']?>">Заголовок</label>
                        <div class="delete-field">
                            <?=$item['title']?>
                        </div>

                        <label for="description<?=$item['id']?>">Краткое описание</label>
                        <div class="delete-field">
                            <?=$item['description']?>
                        </div>

                        <label for="text<?=$item['id']?>">Текст</label>
                        <div class="delete-field">
                            <?=$item['text']?>
                        </div>

                        <label for="imgHd<?=$item['id']?>">Путь до HD фото</label>
                        <div class="delete-field">
                            <?=$item['imgHd']?>
                        </div>
                        <input class="form-control d-none" name="imgHd" id="imgHd<?=$item['id']?>" value="<?=$item['imgHd']?>">

                        <label for="imgFull<?=$item['id']?>">Путь до большого фото</label>
                        <div class="delete-field">
                            <?=$item['imgFull']?>
                        </div>
                        <input class="form-control d-none" name="imgFull" id="imgFull<?=$item['id']?>" value="<?=$item['imgFull']?>">

                        <label for="imgSmall<?=$item['id']?>">Путь до маленького фото</label>
                        <div class="delete-field">
                            <?=$item['imgSmall']?>
                        </div>
                        <input class="form-control d-none" name="imgSmall" id="imgSmall<?=$item['id']?>" value="<?=$item['imgSmall']?>">

                        <label for="date<?=$item['id']?>">Дата публикации (ГГГГ-ММ-ДД)</label>
                        <div class="delete-field">
                            <?=$item['date']?>
                        </div>

                        <input class="btn btn-danger btn-edit" type="submit" value="Удалить">
                    </form>
                </div>
            <?endforeach;?>
            <a class="btn btn-info edit-back" href="<?='../index.php'?>">Назад</a>
        </div>


    </section>
</main>
<script src="<?='/js/handlers/deleteNewsBlockConfirm.js'?>"></script>
<?php
require_once '../../footer.php';
?>
