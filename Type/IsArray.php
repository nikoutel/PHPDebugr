<?php

Class Type_IsArray extends Type_IsComposite {

    public function __construct($outObj) {
        parent::__construct($outObj);
        $this->out($outObj);
    }

}

?>