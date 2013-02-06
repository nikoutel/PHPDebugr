<?php

Class Type_IsScalar extends Type {

    public function __construct() {
        parent::__construct();
    }

    public function send(Output $output) {
        $output->outputScalar($this->_debugVar, $this->_debugText);
    }

}

?>
