<?php
$paths = [
    'CSS' => [
        'current' => getOldPath('css'),
        'new' => '',
        'folder' => 'css/',
        'ext' => '.css'
    ],
    'JS' => [
        'current' => getOldPath('js'),
        'new' => '',
        'folder' => 'js/',
        'ext' => '.js'
    ]
];

function getOldPath($trigger) {
    if ($trigger == 'css') {
        $pattern = '/style\d+/';
        $path = ROOT.'/css/*.css';
    } elseif ($trigger == 'js') {
        $pattern = '/main\d+/';
        $path = ROOT.'/js/*.js';
    }
    foreach (glob($path) as $filename) {
        preg_match($pattern, $filename, $matches);

    }
    return $matches[0];
}
