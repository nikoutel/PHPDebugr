<?php

Class Output_OutputScreen implements Output {

    public $debugVar;
    public $debugText;
    public $writeMethod;
    public $defaultWriteMethodScalar = 'echos';
    public $defaultWriteMethodComposite = 'varDump';
    public $writer;

    public function __construct($writeOptionFlag, Writer $writer) {

        $this->writer = $writer;
        try {
            $this->writeMethod = $this->writer->getWriteMethod($writeOptionFlag);
        } catch (Exception $exc) {
            echo 'valid: {e,v,r,c}'; //@todo error msg
        }
    }

    public function outputScalar($debugVar, $debugText) {

        if ($this->writeMethod == '')
            $this->writeMethod = $this->defaultWriteMethodScalar;

        $writeOut = $this->writeMethod;

        $this->debugVar = $debugVar;
        $this->debugText = $debugText;

        if ($this->debugText != "") {
            $prefix = $this->debugText . ': ';
        }else
            $prefix = "";

        echo '<pre>';
        echo $prefix;
        $this->writer->$writeOut($this->debugVar); // PrintOut::$printMethod
        echo '</pre>';
    }

    public function outputComposite($debugVar, $debugText) {

        if ($this->writeMethod == '')
            $this->writeMethod = $this->defaultWriteMethodComposite;

        $writeOut = $this->writeMethod;

        $this->debugVar = $debugVar;
        $this->debugText = $debugText;

        if ($this->debugText != "") {
            $prefix = $this->debugText . ':<br />';
        }else
            $prefix = "";

        echo '<pre>';
        echo $prefix;
        $this->writer->$writeOut($this->debugVar);
        echo '</pre>';
    }

}

?>