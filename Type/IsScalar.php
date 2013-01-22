<?php

Class Type_IsScalar extends Type {

    public function __construct() {
        parent::__construct();
        //  $this->out($output);
    }

    public function send($output) {
        if ($this->varAsString == "")
            $output->outputScalar($this->var);

        else
            $output->outputScalar($this->varAsString);
    }

}

?>
