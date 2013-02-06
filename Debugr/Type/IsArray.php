<?php

Class Type_IsArray extends Type_IsComposite {

    public function __construct(Output $output) {
        parent::__construct();
        $this->send($output);
    }

}

?>
