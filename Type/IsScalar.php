<?php

Class Type_IsScalar extends Type {

    public function __construct() {
        parent::__construct();
        //  $this->out($output);
    }

    public function send(Output $output) {
        if ($this->debugVarAsString == "")
            $output->outputScalar($this->debugVar, $this->debugText);

        else
            $output->outputScalar($this->debugVarAsString, $this->debugText);
    }

}

?>
