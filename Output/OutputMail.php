<?php

abstract Class Output_OutputMail implements  Output {
    
    public $debugVar;
    public $debugText;
    public $printOption;
    public $defaultPrintOptionScalar = 'echos';
    public $defaultPrintOptionComposite = 'varDump';
    
    public function __construct($printOptionFlag) {

        if ($printOptionFlag != '') {
           // @todo isInBitFild();
            $optstr = '$option = PrintOptions::' . $printOptionFlag . ';'; // @todo array?
            eval($optstr); // @todo SECURITY
            $this->printOption = $option;
        }
    }

    public abstract function outputScalar($debugVar, $debugText);
    public abstract function outputComposite($debugVar, $debugText);

}

?>
