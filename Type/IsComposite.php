<?php

Class Type_IsComposite extends Type {

    public function __construct() {
        parent::__construct();
        // $output->varDumpOut($this->var);
    }

    public function send(Output $output) {
        $output->outputComposite($this->debugVar, $this->debugText);
    }

}

?>
