<?php

abstract Class Output_OutputMail implements  Output {
    
    public $debugVar;
    public $debugText;
    public $printOption;
    
    public function __construct($printOptionFlag) {
        //parent::__construct();

        if ($printOptionFlag != '') {
           // @todo isInBitFild();
            $optstr = '$option = PrintOptions::' . $printOptionFlag . ';'; // @todo array?
            eval($optstr); // @todo SECURITY
            $this->printOption = $option;
        }
    }

    public abstract function outputScalar($debugVar, $debugText, $printOption);
    public abstract function outputComposite($debugVar, $debugText, $printOption);

}

?>
