<?php

Class Output_OutputScreen implements Output {

    public $debugVar;
    public $debugText;
    public $printOption;
    public $defaultPrintOptionScalar = 'echos';
    public $defaultPrintOptionComposite = 'varDump';
    public $printOut;

    public function __construct($printOptionFlag, $po) {

        $this->printOut = $po;
        $this->printOption = $po->getPrintOption($printOptionFlag);
    }

    public function outputScalar($debugVar, $debugText) {

        if ($this->printOption == '')
            $this->printOption = $this->defaultPrintOptionScalar;

        $printMethod = $this->printOption;

        $this->debugVar = $debugVar;
        $this->debugText = $debugText;

        if ($this->debugText != "") {
            $prefix = $this->debugText . ': ';
        }else
            $prefix = "";

        echo '<pre>';
        echo $prefix;
        $this->printOut->$printMethod($this->debugVar); // PrintOut::$printMethod
        echo '</pre>';
    }

    public function outputComposite($debugVar, $debugText) {

        if ($this->printOption == '')
            $this->printOption = $this->defaultPrintOptionComposite;

        $printMethod = $this->printOption;

        $this->debugVar = $debugVar;
        $this->debugText = $debugText;

        if ($this->debugText != "") {
            $prefix = $this->debugText . ':<br />';
        }else
            $prefix = "";

        echo '<pre>';
        echo $prefix;
        $this->printOut->$printMethod($this->debugVar);
        echo '</pre>';
    }

}

?>