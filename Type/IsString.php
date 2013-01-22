<?php

Class Type_IsString extends Type_IsScalar {

    public function __construct($output) {
        parent::__construct();
        $this->send($output);
    }

}

?>
