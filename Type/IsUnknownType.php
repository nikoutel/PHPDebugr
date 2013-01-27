<?php

Class Type_IsUnknownType extends Type_IsComposite {// Technicaly type NULL is not scalar but ...

    public function __construct($output) {
        parent::__construct();
        $this->send($output);
    }

}

?>
