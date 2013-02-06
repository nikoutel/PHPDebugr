<?php

Class Type_IsComposite extends Type {

    public function __construct() {
        parent::__construct();
    }

    public function send(Output $output) {
        $output->outputComposite($this->_debugVar, $this->_debugText);
    }

}

?>
