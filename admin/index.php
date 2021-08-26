<?

session_start();

if (!$_SESSION['login'] || !$_SESSION['password'] || $_COOKIE['user'] != 'admin') {
  setcookie('user', null, -1, '/');
  session_destroy();
  header('Location: ../login.php');
  die();
} else {

  require_once '../db.php';
  require_once '../header.php';
  require_once 'renamePaths.php';
  if (!empty($_POST['rename'])) {
    renameCSSandJS($paths);
  }
}

?>

  <main class="main">
    <section class="promo admin" data-name="admin">
      <div class="container">
        <h1 class="promo__header">Hi, <?=$_SESSION['login']?></h1>
      </div>
    </section>

    <section class="admin-list">

        <h2 class="admin-list__header">Чем займёмся сегодня, <?=$_SESSION['login']?>?</h2>
        <div class="container admin-body__todo">
          <form method="post">
            <input name="rename" class="btn btn-outline-info" value="renameCSS&JS" type="submit">
          </form>
          <div class="card card-admin">
            <div class="card-header">
              НОВОСТИ
            </div>
            <div class="card-body card-body-admin">
              <h5 class="card-title">Редактировать&nbsp;/ Добавить&nbsp;/ Удалить</h5>
              <p class="card-text card-text-admin">Новости — оперативная информация, которая представляет политический, социальный или экономический интерес для аудитории в своей свежести, то есть сообщения о событиях, произошедших недавно или происходящих в данный момент.</p>
              <div class="card-admin-links">
                <a href="<?='/admin/editNews/'?>" class="btn btn-primary">Редактировать</a>
                <a href="<?='/admin/addNews/'?>" class="btn btn-primary">Добавить</a>
                <a href="<?='/admin/deleteNews/'?>" class="btn btn-primary">Удалить</a>
              </div>
            </div>
          </div>
        </div>



    </section>
  </main>



<?php
require_once '../footer.php';
?>
