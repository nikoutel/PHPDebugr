<?php

Class Output_OutputLog implements Output {

    const FILENAME = "output.log";

    public $debugVar;
    public $debugText;
    public $writeMethod;
    private $preText;
    public $defaultWriteMethodScalar = 'echos';
    public $defaultWriteMethodComposite = 'varDump';

    public function __construct($writeOptionFlag, $writer) {

        $this->writer = $writer;
        try {
            $this->writeMethod = $this->writer->getWriteMethod($writeOptionFlag);
        } catch (Exception $exc) {
            echo 'valid: {e,v,r,c}'; //@todo error msg
        }
    }

    public function getPreText() {
        $timestamp = date('d/m/Y H:i:s');
        $requestFile = $_SERVER['REQUEST_URI'];
        $this->preText = '(' . $timestamp . ') ' . $requestFile . "\n";
        return $this->preText;
    }

    public function outputScalar($debugVar, $debugText) {

        if ($this->writeMethod == '')
            $this->writeMethod = $this->defaultWriteMethodScalar;

        $writeOut = $this->writeMethod;

        $this->debugVar = $debugVar;
        $this->debugText = $debugText;

        if ($this->debugText != "") {
            $prefix = $this->debugText . ": ";
        }else
            $prefix = "";

        ob_start();
        echo "\n";
        echo $this->getPreText();
        echo $prefix;
        $this->writer->$writeOut($this->debugVar);
        echo "\n\n";
        $result = ob_get_clean();
        file_put_contents(self::FILENAME, $result, FILE_APPEND);
    }

    public function outputComposite($debugVar, $debugText) {

        if ($this->writeMethod == '')
            $this->writeMethod = $this->defaultWriteMethodComposite;

        $writeOut = $this->writeMethod;

        $this->debugVar = $debugVar;
        $this->debugText = $debugText;

        if ($this->debugText != "") {
            $prefix = $this->debugText . ":\n ";
        }else
            $prefix = "";

        ob_start();
        echo "\n";
        echo $this->getPreText();
        echo $prefix;
        $this->writer->$writeOut($this->debugVar);
        echo "\n";
        $result = ob_get_clean();
        file_put_contents(self::FILENAME, $result, FILE_APPEND);
    }

}

?>
