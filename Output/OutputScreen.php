<?php

Class Output_OutputScreen implements Output {

    public $debugVar;
    public $debugText;
    public $option;

    public function __construct($optionParam) {
        //parent::__construct();

        if ($optionParam != '') {
           // @todo isInBitFild();
            $optstr = '$option = PrintOptions::' . $optionParam . ';'; // @todo array?
            eval($optstr); // @todo SECURITY
            $this->option = $option;
        }
    }

    public function outputScalar($debugVar, $debugText, $opt) {
        if ($this -> option == '') $print=$opt;
        else $print = $this->option;
        echo $print;
        $this->debugVar = $debugVar;
        $this->debugText = $debugText;

        if ($this->debugText != "") {
            $prefix = $this->debugText . ': ';
        }else
            $prefix = "";

        echo '<pre>';
        echo $prefix;
        PrintO::$print($this->debugVar) ;
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