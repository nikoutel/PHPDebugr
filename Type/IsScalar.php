<?php

Class Type_IsScalar extends Type {

    public function __construct() {
        parent::__construct();
        //  $this->out($output);
    }

    public function send($output) {
        if ($this->debugVarAsString == "")
            $output->outputScalar($this->debugVar);

        else
            $output->outputScalar($this->debugVarAsString);
    }

}

?>
