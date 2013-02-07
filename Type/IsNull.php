<?php

Class Type_IsNull extends Type_IsComposite {

    public function __construct(Output $output) {
        parent::__construct();
        $this->send($output);
    }

}

?>
