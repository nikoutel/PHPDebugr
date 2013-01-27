<?php

abstract Class Type { 

    public $debugVar;
    public $debugText;

    public function __construct() {
        $this->debugVar = Debugr::getDebugVar();
        $this->debugText = Debugr::getDebugText();

    }
    abstract public  function send(Output $output);
}

?>
