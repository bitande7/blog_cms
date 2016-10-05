<?php


function my_autoload($class) {

    $class = str_replace('\\', '/', $class);

    if(file_exists(ROOT. '/'. $class.'.php')) {

        require_once (ROOT.'/'.$class.'.php');

    }

}

spl_autoload_register('my_autoload');
