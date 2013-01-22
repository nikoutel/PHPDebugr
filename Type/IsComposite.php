<?php

Class Type_IsComposite extends Type {

    public function __construct() {
        parent::__construct();
        // $outObj->varDumpOut($this->var);
    }

    public function out($outObj) {
        $outObj->varDumpOut($this->var);
    }

}

?>
