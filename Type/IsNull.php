<?php

Class Type_IsNull extends Type_IsScalar {

    public function __construct($output) {
        parent::__construct();
        if ($this->debugVar === null)
            $this->debugVarAsString = 'NULL';

        $this->send($output);
    }

}

?>
