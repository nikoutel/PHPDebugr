<?php

Class Output_OutputLog implements Output {

    public $debugVar;
    public $debugText;
    public $writeMethod;
    private $preText;
    public $defaultWriteMethodScalar;
    public $defaultWriteMethodComposite;
    public $filename;

    public function __construct($writeOptionFlag, Writer $writer) {

        $this->writer = $writer;
        try {
            $this->writeMethod = $this->writer->getWriteMethod($writeOptionFlag);
        } catch (Exception $exc) {
            echo 'valid: {e,v,r,c}'; //@todo error msg
        }
        $this->filename =  config::$config['logFile'];
    }

    public function getPreText() {
        $timestamp = date('d/m/Y H:i:s');
        $requestFile = $_SERVER['REQUEST_URI'];
        $this->preText = '(' . $timestamp . ') ' . $requestFile . "\n";
        return $this->preText;
    }

    public function outputScalar($debugVar, $debugText) {

        $this->defaultWriteMethodScalar = config::$config['defaultWriteMethodScalar']['Log'];
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
        file_put_contents($this->filename, $result, FILE_APPEND);
    }

    public function outputComposite($debugVar, $debugText) {

        $this->defaultWriteMethodComposite = config::$config['defaultWriteMethodComposite']['Log'];
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
        file_put_contents($this->filename, $result, FILE_APPEND);
    }

}

?>
