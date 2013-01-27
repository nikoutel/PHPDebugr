<?php

Class Type_IsBoolean extends Type_IsComposite {

    public $varAsString = ".";

    public function __construct($output) {
        parent::__construct();
        $this->send($output);
    }

}

?>
