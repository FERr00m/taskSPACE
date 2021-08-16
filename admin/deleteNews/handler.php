<?php
session_start();

if (!$_SESSION['login'] || !$_SESSION['password'] || $_COOKIE['user'] != 'admin') {
    setcookie('user', null, -1, '/');
    session_destroy();
    header('Location: ../../login.php');
    die();
} else {

    require_once '../../db.php';
    require_once '../../includes/functions.php';
    require_once '../../header.php';

    $responseSQL = 'SUCCESS';
    $responseServerDeleteFiles = 'С сервера все фото тоже удалены';
    try {
        $data = validatePostData($_POST);

        $stmt = $dbh->prepare("DELETE FROM `news` WHERE `id`=:id");
        $stmt->execute([
            'id'=>$data['id']
        ]);
        try {
            unlink(ROOT . "/{$data['imgFull']}");
            unlink(ROOT . "/{$data['imgSmall']}");
        } catch (Exception $errorFileDelete) {
            $responseServerDeleteFiles = 'Некоторых фото уже не было на сервере. Проверьте пути: ' .
                '<br>' . $data['imgFull'] . '<br>' . $data['imgSmall'];
        }
    } catch (Exception $e) {
        $responseSQL = 'FAILED. Something went wrong...';
    }
}
?>

<main class="main">
    <section class="promo delete-result" data-name="delete result">
        <div class="container">
            <h1 class="promo__header"><?=$responseSQL?></h1>
            <a class="btn btn-info edit-back" href="<?='index.php'?>">Назад</a>
            <div class="quote">
                <p class="quote__author"><?=$e;?></p>
                <p class="quote__author"><?=$responseServerDeleteFiles?></p>
                <p class="quote__author"><?=$errorFileDelete?></p>
            </div>
        </div>
    </section>
</main>


<?
require_once '../../footer.php';
?>

