<?php

Class Type_IsComposite extends Type {

    public function __construct($outObj) {
        parent::__construct($outObj);
        // $outObj->varDumpOut($this->var);
    }

    public function out($outObj) {
        $outObj->varDumpOut($this->var);
    }

}

?>
