<?php

Class Output_OutputScreen implements Output {

    public $debugVar;
    public $debugText;
    public $writeMethod;
    public $defaultWriteMethodScalar; //'echos';
    public $defaultWriteMethodComposite;
    public $writer;

    public function set() {
        
    }

    public function __construct($writeOptionFlag, Writer $writer) {

        $this->writer = $writer;
        try {
            $this->writeMethod = $this->writer->getWriteMethod($writeOptionFlag);
        } catch (Exception $exc) {
            echo 'valid: {e,v,r,c}'; //@todo error msg
        }
    }

    public function outputScalar($debugVar, $debugText) {
        
        $this->defaultWriteMethodScalar = config::$config['defaultWriteMethodScalar']['Screen'];
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
        $this->writer->$writeOut($this->debugVar);
        echo '</pre>';
    }

    public function outputComposite($debugVar, $debugText) {

        $this->defaultWriteMethodComposite = config::$config['defaultWriteMethodComposite']['Screen'];
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