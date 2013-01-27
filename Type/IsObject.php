<?php

Class Type_IsObject extends Type_IsComposite {

    public function __construct(Output $output) {
        parent::__construct();
        $this->send($output);
    }

}

?>
