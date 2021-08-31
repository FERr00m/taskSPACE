<?php
if ($_POST['exit']) {
    setcookie('user', null, -1, '/');
    session_destroy();
    header('Location: ./');
    die();
}
require_once 'db.php';
require_once 'includes/functions.php';
require_once 'constants.php';
require_once 'updatePaths.php';

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#317EFB"/>
    <meta name="keywords" content="космос, вселенная, планета, новости, фото, комета, тумманость">
    <meta name="description" content="Сайт о космосе и о различных явлениях, которые его наполняют.">
    <!-- Обязательный (и достаточный) тег для браузеров -->
    <link type="image/x-icon" rel="shortcut icon" href="<?='/favicon.ico'?>">

    <!-- Yandex.Metrika counter -->
    <script>
       (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
       m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
       (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

       ym(84193969, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
       });
    </script>

    <!-- /Yandex.Metrika counter -->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-61EV71LBHE"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-61EV71LBHE');
    </script>

    <!-- Дополнительные иконки для десктопных браузеров -->
    <link type="image/png" sizes="16x16" rel="icon" href="<?='/icons/favicon-16x16.png'?>">
    <link type="image/png" sizes="32x32" rel="icon" href="<?='/icons/favicon-32x32.png'?>">
    <link type="image/png" sizes="96x96" rel="icon" href="<?='/icons/favicon-96x96.png'?>">
    <link type="image/png" sizes="120x120" rel="icon" href="<?='/icons/favicon-120x120.png'?>">

    <!-- Иконки для Android -->
    <link type="image/png" sizes="72x72" rel="icon" href="<?='/icons/android-icon-72x72.png'?>">
    <link type="image/png" sizes="96x96" rel="icon" href="<?='/icons/android-icon-96x96.png'?>">
    <link type="image/png" sizes="144x144" rel="icon" href="<?='/icons/android-icon-144x144.png'?>">
    <link type="image/png" sizes="192x192" rel="icon" href="<?='/icons/android-icon-192x192.png'?>">
    <link type="image/png" sizes="512x512" rel="icon" href="<?='/icons/android-icon-512x512.png'?>">
    <link rel="manifest" href="<?='/manifest.json'?>">

    <!-- Иконки для iOS (Apple) -->
    <link sizes="57x57" rel="apple-touch-icon" href="<?='/icons/apple-touch-icon-57x57.png'?>">
    <link sizes="60x60" rel="apple-touch-icon" href="<?='/icons/apple-touch-icon-60x60.png'?>">
    <link sizes="72x72" rel="apple-touch-icon" href="<?='/icons/apple-touch-icon-72x72.png'?>">
    <link sizes="76x76" rel="apple-touch-icon" href="<?='/icons/apple-touch-icon-76x76.png'?>">
    <link sizes="114x114" rel="apple-touch-icon" href="<?='/icons/apple-touch-icon-114x114.png'?>">
    <link sizes="120x120" rel="apple-touch-icon" href="<?='/icons/apple-touch-icon-120x120.png'?>">
    <link sizes="144x144" rel="apple-touch-icon" href="<?='/icons/apple-touch-icon-144x144.png'?>">
    <link sizes="152x152" rel="apple-touch-icon" href="<?='/icons/apple-touch-icon-152x152.png'?>">
    <link sizes="180x180" rel="apple-touch-icon" href="<?='/icons/apple-touch-icon-180x180.png'?>">

    <!-- Иконки для MacOS (Apple) -->
    <link color="#e52037" rel="mask-icon" href="<?='/icons/safari-pinned-tab.svg'?>">

    <!-- Иконки и цвета для плиток Windows -->
    <meta name="msapplication-TileColor" content="#2b5797">
    <meta name="msapplication-TileImage" content="<?='/mstile-144x144.png'?>">
    <meta name="msapplication-square70x70logo" content="<?='/mstile-70x70.png'?>">
    <meta name="msapplication-square150x150logo" content="<?='/mstile-150x150.png'?>">
    <meta name="msapplication-wide310x150logo" content="<?='/mstile-310x310.png'?>">
    <meta name="msapplication-square310x310logo" content="<?='/mstile-310x150.png'?>">
    <meta name="application-name" content="My Application">
    <meta name="msapplication-config" content="<?='/browserconfig.xml'?>">

    <!-- Шрифты -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2&family=Source+Code+Pro:wght@400;500;700&family=Style+Script&family=Teko:wght@400;700&display=swap" rel="stylesheet">

    <!-- Стили Bootstrap -->
    <link rel="stylesheet" href="<?='/css/bootstrap.min.css'?>">

    <!-- Flex Slider стили -->
    <?/*<link rel="stylesheet" href="<?='/js/sliders/flexSlider/flexslider.css'?>" />*/?>

    <!-- main CSS -->
    <link rel="stylesheet"  href="<?='/'.$paths['CSS']['folder'].$paths['CSS']['current'].$paths['CSS']['ext'];?>">
    <script src="<?='/js/jquery-3.6.0.min.js'?>"></script>
    <title>Space - сайт о космосе</title>
</head>
<body id="up">
    <noscript><div><img src="https://mc.yandex.ru/watch/84193969" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <div class="overlay-loader">
      <div class="spinner-loader"></div>
    </div>

    <header class="header" >
        <div class="container">
            <nav class="navbar navbar-dark  navbar-expand-lg ">
                <div class="container-fluid">

                  <a  href="<?='/'?>">
                    <div class="navbar-brand">
                      <span>SPACE</span><img src="<?='/img/logo.svg'?>" width="40" height="40" alt="logo">
                    </div>
                  </a>

                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a class="nav-link"  data-name="space" href="<?='/'?>">Главная</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" data-name="news" href="<?='/news/'?>">Новости</a>
                      </li>

                      <!-- Группа вложенной навигации -->
                      <li class="nav-item">
                        <div class="btn-group" id="wrapper-div-nav">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuClickableInside" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                            КОСМОС
                          </button>
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuClickableInside">
                            <li>
                              <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                  Солнечная система
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                  <li class="dropdown-menu-adaptive">
                                    <a class="dropdown-item" href="<?='/space/solarsystem/planets/';?>">Планеты</a>
                                  </li>

                                </ul>
                              </div>
                            </li>

                            <!-- <li><a class="dropdown-item" href="#">Еще одна ссылка</a></li> -->

                          </ul>
                        </div>
                      </li>
                      <!-- END Группа вложенной навигации -->

                    </ul>
                    <?/*<form class="d-flex" id="form">
                      <input class="form-control me-2" type="search" placeholder="найти..." aria-label="Search">
                      <button class="btn btn-outline-info" type="submit">поиск</button>
                    </form>*/?>
                    <div class="login-btn">
                      <? if (!$_COOKIE['user']): ?>
                        <a class="btn btn-info" href="<?='/login.php'?>">войти</a>
                      <?elseif ($_COOKIE['user'] == 'admin'):?>
                        <a class="btn btn-info" href="<?='/admin/'?>"><?=strtoupper($_COOKIE['user'])?></a>
                        <form method="post">
                          <input class="btn btn-danger" type="submit" value="EXIT" name="exit">
                        </form>
                      <?endif;?>

                    </div>

                  </div>
                </div>
              </nav>
              <!-- <div class="breadcrumb-wrapper">
                <div aria-label="breadcrumb" class="--bs-breadcrumb-divider: '>';">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Libr</a></li>
                    <li class="breadcrumb-item"><a href="#">Librsds</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                  </ol>
                </div>
              </div> -->
        </div>
    </header>
