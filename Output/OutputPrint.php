<?php

Class Output_OutputPrint extends Output {

    public function echoOut($var) {
        // parent::__construct();
        echo '<pre>';
        echo $var;
        echo '<br />';
        echo '</pre>';
    }

    public function varDumpOut($var) {
        //  parent::__construct();
        echo '<pre>';
        var_dump($var);
        echo '<br />';
        echo '</pre>';
    }

//    public function printROut() {
//        
//    }
}

?>