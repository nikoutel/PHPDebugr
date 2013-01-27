<?php

Class Type_IsBoolean extends Type_IsComposite {

    public $varAsString = ".";

    public function __construct(Output $output) {
        parent::__construct();
        $this->send($output);
    }

}

?>
