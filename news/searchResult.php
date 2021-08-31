<?php
require_once '../header.php';

?>

<main class="main">
    <section class="news-list promo news-details" data-name="Результаты поиска">
        <div class="container">
            <hr class="hr-news-details">
            <div class="news-info">
            <div class="loader-search">
                <img width="80" height="80" src="<?='/img/news/loaderSearch.svg'?>" alt="loader-search">
            </div>
                <h1 class="news-list__header">Поиск</h1>
                <form class="d-flex search-form" id="search" method="get" action="search.php">
                    <input name="query" class="form-control me-2" type="search" placeholder="поиск..." aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">найти</button>
                </form>
                <h2 class="search-header">Результаты поиска:</h2>
                <div id="result"><?require_once 'search.php'?></div>

                <button class="btn btn-info back">Назад</button>
            </div>
            <hr class="hr-news-details">

        </div>

    </section>

</main>
<script src="<?='/js/handlers/searchAjax.js'?>"></script>
<?php
require_once '../footer.php';
?>
