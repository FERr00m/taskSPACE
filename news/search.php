<?php
if (!empty($_GET['query'])) {
    require_once '../db.php';
    require_once '../includes/functions.php';

    $q = preg_replace('/[+@)(]{1,}/', '', validatePostData($_GET)['query']);

    $result = $dbh->query("SELECT *,
    MATCH (title, text) AGAINST ('$q' IN BOOLEAN MODE) as REL
    FROM news
    WHERE MATCH (title, text) AGAINST ('$q' IN BOOLEAN MODE)
    ORDER BY REL;");

    function highlightText($text, $words) {
        $words = explode(' ', $words);
        foreach ($words as $key => $value) {
           $value = trim($value, '*');
           $preg = "/{$value}/i";

            if (!empty($value)) {

            $text = preg_replace($preg, '<span class="highlight-text">' . mb_strtoupper($value) . '</span>', $text);
            }
        }
        return $text;
    }

}
?>

<?

    foreach($result as $item) {
        $title = highlightText($item['title'], $q);
        $text = highlightText($item['text'], $q);
    echo "
            <div class='search-result-item'>
            <h3>$title</h3>
            <p>$text</p>
            <a class='btn search-result-item__link' href='details.php?id=$item[id]'>Подробнее</a>
            </div><br>";
    }




?>
