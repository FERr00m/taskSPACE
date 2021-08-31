<?php

/**
 * Валидирование массива $_POST с помощью функций: htmlspecialchars и trim
 * @param $postData Массив $_POST
 * @return mixed
 */
function validatePostData($postData) {
    foreach ($postData as $key => $value) {
        $postData[$key] = trim(htmlspecialchars($value));
    }
    return $postData;
}

function getRoot($path) {
    $path = preg_replace('~/\D+public_html/~', '', $path);
    return  $path;
}

/**
 * Обрезает текст по количеству символов, добавляя нужное окончание
 * @param string $text исходный текстк
 * @param int $start начиная с этой позиции
 * @param int $stop заканчивая на этой позиции
 * @param string $end что будет в конце текста
 * @return string
 */
function truncateText($text, $start, $stop, $end) {
    $text = mb_substr($text, $start, $stop).$end;
    return $text;
}
