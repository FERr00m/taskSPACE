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
