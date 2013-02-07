<?php

Class Type_IsString extends Type_IsScalar {

    public function __construct(Output $output) {
        parent::__construct();
        $this->send($output);
    }

}

?>
