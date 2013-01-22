<?php

Class Type_IsDouble extends Type_IsScalar {

    public function __construct($outObj) {
        parent::__construct();
        $this->out($outObj);
    }

}

?>
