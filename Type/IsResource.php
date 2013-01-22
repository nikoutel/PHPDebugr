<?php

Class Type_IsResource extends Type_IsComposite {

    public function __construct($output) {
        parent::__construct();
        $this->send($output);
    }

}

?>
