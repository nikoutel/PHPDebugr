<?php

interface Output {

    public function outputScalar($debugVar, $debugText, $printOption);
    public function outputComposite($debugVar, $debugText, $printOption);

}

?>
