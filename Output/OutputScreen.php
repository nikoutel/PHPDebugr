<?php

Class Output_OutputScreen implements  Output {

    public $debugVar;
    public $debugText;
    public $options;
    
    public function __construct($options) {
        //parent::__construct();
        $this->options = $options;
        $optstr = '$opt = PrintOptions::' . $options . ';';
        eval( $optstr); // SECURITY
        echo $opt;
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