<?php

Class Type_IsNull extends Type_IsScalar {

    public function __construct($outObj) {
        parent::__construct();
        if ($this->var === null)
            $this->varAsString = 'NULL';

        $this->out($outObj);
    }

}

?>
