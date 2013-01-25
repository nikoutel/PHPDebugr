<?php

Class Type {

    public $debugVar;
    public $debugText;
    public $debugVarAsString = "";

    public function __construct() {
        $this->debugVar = Debugr::$debugVar; // @todo getter;
        $this->debugText = Debugr::$debugText;

    }

}

?>
