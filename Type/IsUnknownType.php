<?php

Class Type_IsUnknownType extends Type_IsScalar {

    public function __construct($outObj) {
        parent::__construct();

        // if ($this->getVar() === null)
        $this->varAsString = 'Unknown Type';
        $this->out($outObj);
        //$outObj->echoOut($outMsg);
    }

}

?>
