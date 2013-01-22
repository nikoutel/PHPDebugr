<?php

Class Type_IsNull extends Type_IsScalar {

    public function __construct($output) {
        parent::__construct();
        if ($this->var === null)
            $this->varAsString = 'NULL';

        $this->send($output);
    }

}

?>
