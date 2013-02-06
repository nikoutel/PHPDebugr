<?php
function __autoload($class_name) {
    $class_file_path = str_replace('_', '/', $class_name) . '.php';
    require(__DIR__.'/'.$class_file_path);
}
?>
