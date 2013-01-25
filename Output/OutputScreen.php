<?php

Class Output_OutputScreen implements Output {

    public $debugVar;
    public $debugText;
    public $printOption;
    public $defaultPrintOptionScalar = 'echos';
    public $defaultPrintOptionComposite = 'varDump';

    public function __construct($printOptionFlag) {
        
      //  $this->printOption = getPrintOption($printOptionFlag);

        if ($printOptionFlag != '') {
           // @todo isInBitFild();
            $optstr = '$option = PrintOptions::' . $printOptionFlag . ';'; // @todo array?
            eval($optstr); // @todo SECURITY
            $this->printOption = $option;
        }
    }

    public function outputScalar($debugVar, $debugText) {
        
        if ($this -> printOption == '')  $this->printOption = $this->defaultPrintOptionScalar;
              
        $print = $this->printOption;
        
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
        
        if ($this -> printOption == '')  $this->printOption = $this->defaultPrintOptionComposite;
        
        $print = $this->printOption;
        
        $this->debugVar = $debugVar;
        $this->debugText = $debugText;

        if ($this->debugText != "") {
            $prefix = $this->debugText . ':<br />';
        }else
            $prefix = "";

        echo '<pre>';
        echo $prefix;
        PrintO::$print($this->debugVar) ;
        echo '</pre>';
    }

}

?>