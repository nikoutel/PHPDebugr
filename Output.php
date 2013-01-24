<?php

interface Output {

    public function outputScalar($debugVar, $debugText, $opt);
    public function outputComposite($debugVar, $debugText);

}

?>
