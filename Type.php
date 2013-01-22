<?php

Class Type {

    public $var;
    public $varName;
    public $varAsString = "";

    public function __construct() {
        $this->var = Debugr::$var;
        $this->varName = Debugr::$varName;

        if ($this->varName != "") {  // 
            echo $this->varName;     // @todo not here
            echo ': ';               //
        } echo '0**';
    }

}

?>
