<?php

interface Output {

    public function outputScalar($debugVar, $debugText);

    public function outputComposite($debugVar, $debugText);
}

?>
