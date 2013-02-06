<?php

abstract Class Type { 

    protected $_debugVar;
    protected $_debugText;

    public function __construct() {
        $this->_debugVar = Debugr::getDebugVar();
        $this->_debugText = Debugr::getDebugText();

    }
    abstract public  function send(Output $output);
}

?>
