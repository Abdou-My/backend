<?php


spl_autoload_register('autoLoad');

function autoLoad($class_name){
    $array_paths = array(
        'Database/',
        'Controller/',
        'Models/',
    );

    $parts = explode('\\',$class_name);
    $name = array_pop($parts);
    foreach($array_paths as $path){
        $file = sprintf($path.'%s.php', $name);
        if(is_file($file)){
            include_once $file;
        }
    }
}

?>