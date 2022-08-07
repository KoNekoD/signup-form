<?php

/**
 * Функция autoload для автоматического подключения классов
 */
function autoload()
{
    // Массив папок, в которых могут находиться необходимые классы
    $array_paths = array(
        '/components/',
        '/models/',
    );

    for ($i=0; $i < count($array_paths); $i++) { 
        $files = array_diff( scandir(ROOT.$array_paths[$i]), array('..', '.'));
        // Начинаем с двойки т.к. удалили . и .. в массиве
        for ($j=2; $j < count($files)+2; $j++) {
            $file_arr = explode('.', $files[$j]);
            $extension = end($file_arr);
            if ($extension == 'php') {
                require_once ROOT.$array_paths[$i].$files[$j];
            }
        }
    }

    // Проходим по массиву папок
    
}
autoload();