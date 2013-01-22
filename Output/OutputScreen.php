<?php

Class Output_OutputScreen extends Output {

    public function outputScalar($var) {
        // parent::__construct();
        echo '<pre>';
        echo $var;
        echo '<br />';
        echo '</pre>';
    }

    public function outputComposite($var) {
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