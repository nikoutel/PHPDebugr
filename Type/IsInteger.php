<?php

Class Type_IsInteger extends Type_IsScalar {

    public function __construct($outObj) {
        parent::__construct($outObj);
        $this->out($outObj);
    }

}

?>