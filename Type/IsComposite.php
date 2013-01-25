<?php

Class Type_IsComposite extends Type {
    
    public $defaultPrintOption = 'varDump';

    public function __construct() {
        parent::__construct();
        // $output->varDumpOut($this->var);
    }

    public function send($output) {
        $output->outputComposite($this->debugVar, $this->debugText, $this->defaultPrintOption);
    }

}

?>
