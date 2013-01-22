<?php

Class Type_IsBoolean extends Type_IsScalar {

    public $varAsString = ".";

    public function __construct($outObj) {
        parent::__construct();
        if ($this->var) {

            $this->varAsString = 'TRUE';
        } else {

            $this->varAsString = 'FALSE';
        }
        $this->out($outObj);
    }

}

?>
