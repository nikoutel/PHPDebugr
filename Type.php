<?php

Class Type {

    public $debugVar;
    public $debugText;
    public $debugVarAsString = "";

    public function __construct() {
        $this->debugVar = Debugr::$debugVar;
        $this->debugText = Debugr::$debugText;

    }

}

?>
