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
        preg_match('~^img/hd/\w+(-{0,1})\w+.(jpg|jpeg|png)$~', "{$data['imgHd']}", $matches);
        if ($data['imgHd'] == '' || !$matches) {
            $data['imgHd'] = null;
        }

        $stmt = $dbh->prepare(
            "UPDATE `news`
                SET `title` = :title,
                    `description` = :description,
                    `text` = :text,
                    `imgHd` = :imgHd,
                    `imgFull` = :imgFull,
                    `imgSmall` = :imgSmall,
                    `date` = :date
                WHERE `id`=:id");
        $stmt->execute([
            'title'=>$data['title'],
            'description'=>$data['description'],
            'text'=>$data['text'],
            'imgHd'=>$data['imgHd'],
            'imgFull'=>$data['imgFull'],
            'imgSmall'=>$data['imgSmall'],
            'date'=>$data['date'],
            'id'=>$data['id']
        ]);
    } catch (Exception $e) {
        $responseSQL = 'FAILED. Something went wrong...';
    }



}
?>

<main class="main">
    <section class="promo edit-result" data-name="edit result">
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
