<?php

Class Type_IsUnknownType extends Type_IsScalar {

    public function __construct($output) {
        parent::__construct();

        // if ($this->getVar() === null)
        $this->varAsString = 'Unknown Type';
        $this->send($output);
        //$output->echoOut($outMsg);
    }

}

?>
