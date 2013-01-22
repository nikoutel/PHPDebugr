<?php

Class Type {

    public $debugVar;
    public $debugText;
    public $debugVarAsString = "";

    public function __construct() {
        $this->debugVar = Debugr::$debugVar;
        $this->debugText = Debugr::$debugText;

        if ($this->debugText != "") {  // 
            echo $this->debugText;     // @todo not here
            echo ': ';               //
        }
    }

}

?>
