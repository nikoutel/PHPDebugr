<?php

Class Type_IsUnknownType extends Type_IsScalar {// Technicaly type NULL is not scalar but ...
// @todo IsOther?
    public function __construct($output) {
        parent::__construct();

        // if ($this->getVar() === null)
        $this->debugVarAsString = 'Unknown Type';
        $this->send($output);
        //$output->echoOut($outMsg);
    }

}

?>
