<?php

Class Type { // @todo abstract

    public $debugVar;
    public $debugText;
    public $debugVarAsString = "";

    public function __construct() {
        $this->debugVar = Debugr::getDebugVar(); // @todo getter;
        $this->debugText = Debugr::getDebugText();

    }

}

?>
