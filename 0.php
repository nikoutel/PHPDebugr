<?php

class zero {

    public static function fa() {
        $class_name = 'Output_OutputPrint';
        $class_file_path = str_replace('_', '/', $class_name) . '.php';
        echo $class_file_path;
    }

}

?>
