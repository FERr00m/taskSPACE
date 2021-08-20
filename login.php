<?php

require './db.php';

session_start();

if ($_POST['enter']) {
    $users = $dbh->query("SELECT * FROM users");

    foreach ($users as $user) {
        if ($user['login'] == $_POST['login'] && password_verify($_POST['password'], $user['password'])) {
            $_SESSION['login'] = $_POST['login'];
            $_SESSION['password'] = $_POST['password'];
            setcookie('user', $_POST['login'], [
              'expires' => time() + 3600,
                'path' => '/',
                'httponly' => true,
                'secure' => true
            ]);
            header('Location: ./admin/index.php');
            die();
        } else {

        }
    }
}
require_once './header.php';
?>

<main class="main">
  <section class="promo login" data-name="login">
    <div class="container">
      <h1 class="promo__header">LOGIN</h1>
      <form class="row g-3" id="form-login" method="post">
        <div class="col-auto">
          <label for="login" class="visually-hidden">login</label>
          <input type="text" class="form-control" id="login" name="login" placeholder="логин">
        </div>
        <div class="col-auto">
          <label for="password" class="visually-hidden">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="пароль">
        </div>
        <div class="col-auto">
          <input type="submit" class="btn btn-primary mb-3" name="enter" value="войти">
        </div>
      </form>
    </div>
  </section>
</main>


<?php
require_once './footer.php';
?>
