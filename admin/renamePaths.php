<?php

function renameCSSandJS ($paths) {
    $date = date('dmY');
    $random = rand(1, 99);
    $paths['CSS']['new'] = 'style'.$date.$random;
    $paths['JS']['new'] = 'main'.$date.$random;

    foreach ($paths as $path) {
        rename(ROOT."/{$path['folder']}{$path['current']}{$path['ext']}", ROOT."/{$path['folder']}{$path['new']}{$path['ext']}");
    }
}
