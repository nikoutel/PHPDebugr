<?php

Class Type_IsScalar extends Type {

    public function __construct() {
        parent::__construct();
        //  $this->out($outObj);
    }

    public function out($outObj) {
        if ($this->varAsString == "")
            $outObj->echoOut($this->var);

        else
            $outObj->echoOut($this->varAsString);
    }

}

?>
