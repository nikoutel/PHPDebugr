<?php

Class Type_IsScalar extends Type {

    public function __construct() {
        parent::__construct();
        //  $this->out($output);
    }

    public function send(Output $output) {
            $output->outputScalar($this->_debugVar, $this->_debugText);

    }

}

?>
