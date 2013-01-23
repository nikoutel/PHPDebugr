<?php

Class Output_OutputScreen implements  Output {

    public $debugVar;
    public $debugText;
    
    public function __construct() {
        //parent::__construct();
    }

    public function outputScalar($debugVar, $debugText) {
        $this->debugVar = $debugVar;
        $this->debugText = $debugText;

        if ($this->debugText != "") {
            $prefix = $this->debugText . ': ';
        }else
            $prefix = "";

        echo '<pre>';
        echo $prefix;
        echo $this->debugVar;
        echo '</pre>';
    }

    public function outputComposite($debugVar, $debugText) {
        $this->debugVar = $debugVar;
        $this->debugText = $debugText;

        if ($this->debugText != "") {
            $prefix = $this->debugText . ':<br />';
        }else
            $prefix = "";

        echo '<pre>';
        echo $prefix;
        var_dump($this->debugVar);
        echo '</pre>';
    }

//    public function printROut() {
//        
//    }
}

?>