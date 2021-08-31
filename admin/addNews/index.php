<?php
session_start();

if (!$_SESSION['login'] || !$_SESSION['password'] || $_COOKIE['user'] != 'admin') {
    setcookie('user', null, -1, '/');
    session_destroy();
    header('Location: ../../login.php');
    die();
} else {

    require_once '../../header.php';

    $news = $dbh->query("SELECT * FROM `news`");
}
?>

<main class="main">
    <section class="promo add-news" data-name="add news">
        <div class="container">
            <h1 class="promo__header">ADD NEWS</h1>
        </div>
    </section>

    <section class="edit-list">
        <h2 class="admin-list__header">ДОБАВИТЬ НОВОСТЬ</h2>

        <div class="container edit-list-body">
            <a class="btn btn-info edit-back" href="<?='../'?>">Назад</a>

                <div class="card card-admin">
                    <form action="handler.php" method="post" id="form-add">
                        <p class="edit-list-item-par">Новость</p>

                        <label for="title">Заголовок<sup>*</sup> (минимум 3, максимум 100 символов, сейчас: <span class="symbols-length-title">0</span>)</label>
                        <p class="add-alert add-alert-title"></p>
                        <textarea class="form-control" maxlength="100" rows="1" id="title" name="title" placeholder="Напиши..."></textarea>

                        <label for="description">Краткое описание<sup>*</sup> (минимум 3, максимум 100 символов, сейчас: <span class="symbols-length-description">0</span>)</label>
                        <p class="add-alert add-alert-description"></p>
                        <textarea class="form-control " maxlength="100" rows="3" name="description" id="description" placeholder="Напиши..."></textarea>

                        <label for="text">Текст<sup>*</sup> (минимум 3, максимум 1500 символов, сейчас: <span class="symbols-length-text">0</span>)</label>
                        <p class="add-alert add-alert-text"></p>
                        <textarea class="form-control" maxlength="1500" rows="10" name="text" id="text" placeholder="Напиши..."></textarea>

                        <label for="sourceLink">Ссылка на источник (если есть)</label>
                        <input type="text" class="form-control " name="sourceLink" id="sourceLink">

                        <label for="sourceName">Название источника</label>
                        <input type="text" class="form-control " name="sourceName" id="sourceName">

                        <label for="authorLink">Ссылка на автора (если есть)</label>
                        <input type="text" class="form-control " name="authorLink" id="authorLink">

                        <label for="authorName">Имя автора</label>
                        <input type="text" class="form-control " name="authorName" id="authorName">

                        <label for="imgHd">Путь до HD фото (удалить путь, если нет фото)</label>
                        <input type="text" class="form-control " name="imgHd" id="imgHd" value="img/hd/">

                        <label for="imgFull">Путь до большого фото<sup>*</sup></label>
                        <p class="add-alert add-alert-imgFull"></p>
                        <input type="text" class="form-control " name="imgFull" id="imgFull" value="img/news/">

                        <label for="imgSmall">Путь до маленького фото<sup>*</sup></label>
                        <p class="add-alert add-alert-imgSmall"></p>
                        <input type="text" class="form-control" name="imgSmall" id="imgSmall" value="img/news/small/">

                        <label for="date">Дата публикации<sup>*</sup> (ДД-ММ-ГГГГ)</label>
                        <p class="add-alert add-alert-date"></p>
                        <input type="date" class="form-control " name="date" id="date" value="<?=date("Y-m-d")?>">

                        <input class="btn btn-success btn-edit" type="submit" value="Добавить">
                        <p class="add-alert add-alert-form"></p>
                    </form>
                </div>

            <a class="btn btn-info edit-back" href="<?='../'?>">Назад</a>
        </div>


    </section>
</main>
<script src="<?='/js/handlers/addNewsBlockInputsCheck.js'?>"></script>
<?php
require_once '../../footer.php';
?>
