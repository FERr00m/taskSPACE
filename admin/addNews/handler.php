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

    $responseSQL = 'SUCCESS';

//    try {
//        $id = $_POST['id'];
//        $title = htmlspecialchars($_POST['title']);
//        $description = htmlspecialchars($_POST['description']);
//        $text = htmlspecialchars($_POST['text']);
//        $imgFull = htmlspecialchars($_POST['imgFull']);
//        $imgSmall = htmlspecialchars($_POST['imgSmall']);
//        $date = htmlspecialchars($_POST['date']);
//
//        $stmt = $dbh->prepare(
//            "UPDATE `news`
//                SET `title` = :title,
//                    `description` = :description,
//                    `text` = :text,
//                    `imgFull` = :imgFull,
//                    `imgSmall` = :imgSmall,
//                    `date` = :date
//                WHERE `id`=:id");
//        $stmt->execute([
//            'title'=>$title,
//            'description'=>$description,
//            'text'=>$text,
//            'imgFull'=>$imgFull,
//            'imgSmall'=>$imgSmall,
//            'date'=>$date,
//            'id'=>$id
//        ]);
//    } catch (Exception $e) {
//        $responseSQL = 'FAILED. Something went wrong...';
//    }



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

