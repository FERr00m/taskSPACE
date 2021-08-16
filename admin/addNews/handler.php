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

    try {
        $data = validatePostData($_POST);

        $stmt = $dbh->prepare(
            "INSERT INTO `news`
                    (`title`, `description`, `text`, `imgFull`, `imgSmall`, `date`)
                    VALUES (:title, :description, :text, :imgFull, :imgSmall, :date)");
        $stmt->execute([
            'title'=>$data['title'],
            'description'=>$data['description'],
            'text'=>$data['text'],
            'imgFull'=>$data['imgFull'],
            'imgSmall'=>$data['imgSmall'],
            'date'=>$data['date']
        ]);
    } catch (Exception $e) {
        $responseSQL = 'FAILED. Something went wrong...';
    }



}
?>

<main class="main">
    <section class="promo add-result" data-name="add result">
        <div class="container">
            <h1 class="promo__header"><?=$responseSQL?></h1>
            <a class="btn btn-info edit-back" href="<?='index.php'?>">Назад</a>
            <div class="quote">
                <p class="quote__author" "><?=$e;?></p>
            </div>
        </div>
    </section>
</main>


<?
require_once '../../footer.php';
?>

