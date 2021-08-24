<?php
$paths = [
    'CSS' => [
        'current' => getOldPath('css'),
        'new' => '',
        'folder' => 'css',
        'ext' => 'css'
    ],
    'JS' => [
        'current' => getOldPath('js'),
        'new' => '',
        'folder' => 'js',
        'ext' => 'js'
    ]
];

function getOldPath($trigger) {
    if ($trigger == 'css') {
        $pattern = '/style\w+/';
        $path = 'css/*.css';
    } elseif ($trigger == 'js') {
        $pattern = '/main\w+/';
        $path = 'js/*.js';
    }

    foreach (glob($path) as $filename) {
        preg_match($pattern, $filename, $matches);

    }
    return $matches[0];
}


function renameCSSandJS ($paths) {
    $date = date('dmY');
    $random = rand(1, 99);
    $paths['CSS']['current'] = getOldPath('css');
    $paths['JS']['current'] = getOldPath('js');
    $paths['CSS']['new'] = 'style'.$date.$random;
    $paths['JS']['new'] = 'main'.$date.$random;

    foreach ($paths as $path) {
        rename(__DIR__."/{$path['folder']}/{$path['current']}.{$path['ext']}", __DIR__."/{$path['folder']}/{$path['new']}.{$path['ext']}");
    }
}
