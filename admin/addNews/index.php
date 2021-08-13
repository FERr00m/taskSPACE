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
            <a class="btn btn-info edit-back" href="<?='../index.php'?>">Назад</a>

                <div class="card card-admin">
                    <form action="handler.php" method="post" id="form-add">
                        <p class="edit-list-item-par">Новость</p>

                        <label for="title">Заголовок</label>
                        <textarea class="form-control" rows="1" id="title" name="title" placeholder="Напиши..."></textarea>

                        <label for="description">Краткое описание</label>
                        <textarea class="form-control " rows="3" name="description" id="description" placeholder="Напиши..."></textarea>

                        <label for="text">Текст</label>
                        <textarea class="form-control" rows="10" name="text" id="text" placeholder="Напиши..."></textarea>

                        <label for="imgFull">Путь до большого фото</label>
                        <input class="form-control " name="imgFull" id="imgFull" value="img/news/">

                        <label for="imgSmall">Путь до маленького фото</label>
                        <input class="form-control" name="imgSmall" id="imgSmall" value="img/news/small/">

                        <label for="date">Дата публикации</label>
                        <input class="form-control " name="date" id="date" value="<?=date("d-m-Y")?>">

                        <input class="btn btn-success btn-edit" type="submit" value="Добавить">
                    </form>
                </div>

            <a class="btn btn-info edit-back" href="<?='../index.php'?>">Назад</a>
        </div>


    </section>
</main>
<script src="<?='/js/handlers/inputsCheck.js'?>"></script>
<?php
require_once '../../footer.php';
?>
