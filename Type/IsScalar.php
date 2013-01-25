<?php

Class Type_IsScalar extends Type {
    
    public $defaultPrintOption = 'echos';

    public function __construct() {
        parent::__construct();
        //  $this->out($output);
    }

    public function send($output) {
        if ($this->debugVarAsString == "")
            $output->outputScalar($this->debugVar, $this->debugText , $this->defaultPrintOption);

        else
            $output->outputScalar($this->debugVarAsString, $this->debugText, $this->defaultPrintOption);
    }

}

?>
