<?php

Class Type_IsBoolean extends Type_IsScalar {

    public $varAsString = ".";

    public function __construct($output) {
        parent::__construct();
        if ($this->debugVar) {

            $this->debugVarAsString = 'TRUE';
        } else {

            $this->debugVarAsString = 'FALSE';
        }
        $this->send($output);
    }

}

?>
