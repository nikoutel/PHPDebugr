<?php

Class Output_OutputScreen extends Output {

    public $debugVar;
    public $debugText;

    public function outputScalar($debugVar, $debugText) {
        $this->debugVar = $debugVar;
        $this->debugText = $debugText;

        if ($this->debugText != "") {
            $pre = $this->debugText . ': ';
        }else
            $pre = "";

        echo '<pre>';
        echo $pre;
        echo $this->debugVar;
        echo '</pre>';
    }

    public function outputComposite($debugVar, $debugText) {
        $this->debugVar = $debugVar;
        $this->debugText = $debugText;

        if ($this->debugText != "") {
            $pre = $this->debugText . ':<br />';
        }else
            $pre = "";

        echo '<pre>';
        echo $pre;
        var_dump($this->debugVar);
        echo '</pre>';
    }

//    public function printROut() {
//        
//    }
}

?>