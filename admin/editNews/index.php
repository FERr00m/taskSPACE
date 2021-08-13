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
}
?>

<main class="main">
    <section class="promo edit-news" data-name="edit news">
        <div class="container">
            <h1 class="promo__header">EDIT NEWS</h1>
        </div>
    </section>

    <section class="edit-list">
      <h2 class="admin-list__header">Редактирование</h2>

      <div class="container edit-list-body">
        <a class="btn btn-info edit-back" href="<?='../index.php'?>">Назад</a>
          <? foreach ($news as $item): ?>
          <div class="card card-admin">
            <form action="handler.php" method="post" id="form<?=$item['id']?>">
              <p class="edit-list-item-par">Новость id - <?=$item['id']?><input class="d-none" name="id" value="<?=$item['id']?>"></p>
              <label for="title<?=$item['id']?>">Заголовок</label>
              <textarea class="form-control" rows="1" id="title<?=$item['id']?>" name="title"><?=$item['title']?></textarea>
              <label for="description<?=$item['id']?>">Краткое описание</label>
              <textarea class="form-control " rows="3" name="description" id="description<?=$item['id']?>"><?=$item['description']?></textarea>
              <label for="text<?=$item['id']?>">Текст</label>
              <textarea class="form-control" rows="10" name="text" id="text<?=$item['id']?>"><?=$item['text']?></textarea>
              <label for="imgFull<?=$item['id']?>">Путь до большого фото</label>
              <input class="form-control " name="imgFull" id="imgFull<?=$item['id']?>" value="<?=$item['imgFull']?>">
              <label for="imgSmall<?=$item['id']?>">Путь до маленького фото</label>
              <input class="form-control " name="imgSmall" id="imgSmall<?=$item['id']?>" value="<?=$item['imgSmall']?>">
              <label for="date<?=$item['id']?>">Дата публикации</label>
              <input class="form-control " name="date" id="date<?=$item['id']?>" value="<?=date("d-m-Y", strtotime($item['date']))?>">
              <input class="btn btn-warning btn-edit" type="submit" value="Редактировать">
            </form>
          </div>
        <?endforeach;?>
        <a class="btn btn-info edit-back" href="<?='../index.php'?>">Назад</a>
      </div>


    </section>
</main>

<?php
require_once '../../footer.php';
?>
