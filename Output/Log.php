<?php

Class Output_Log implements Output {

    private $_debugVar;
    private $_debugText;
    private $_writeMethod;
    private $_defaultWriteMethodScalar;
    private $_defaultWriteMethodComposite;
    private $_writer;
    private $_preText;
    private $_filename;

    public function __construct($writeOptionFlag, Writer $writer) {

        $this->_writer = $writer;
        try {
            $this->_writeMethod = $this->_writer->getWriteMethod($writeOptionFlag);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        $this->_filename = config::$config['logFile'];
    }

    private function _getPreText() {
        $timestamp = date('d/m/Y H:i:s');
        $requestFile = $_SERVER['REQUEST_URI'];
        $this->_preText = '(' . $timestamp . ') ' . $requestFile . "\n";
        return $this->_preText;
    }

    public function outputScalar($debugVar, $debugText) {

        $this->_defaultWriteMethodScalar = config::$config['defaultWriteMethodScalar']['Log'];
        if ($this->_writeMethod == '')
            $this->_writeMethod = $this->_defaultWriteMethodScalar;

        $writeOut = $this->_writeMethod;

        $this->_debugVar = $debugVar;
        $this->_debugText = $debugText;

        if ($this->_debugText != "") {
            $prefix = $this->_debugText . ": ";
        }else
            $prefix = "";

        ob_start();
        echo "\n";
        echo $this->_getPreText();
        echo $prefix;
        $this->_writer->$writeOut($this->_debugVar);
        echo "\n\n";
        $result = ob_get_clean();
        $fp = @file_put_contents($this->_filename, $result, FILE_APPEND);
        if ($fp === FALSE) {
            echo $this->_filename . ' is not writable';
        }
    }

    public function outputComposite($debugVar, $debugText) {

        $this->_defaultWriteMethodComposite = config::$config['defaultWriteMethodComposite']['Log'];
        if ($this->_writeMethod == '')
            $this->_writeMethod = $this->_defaultWriteMethodComposite;

        $writeOut = $this->_writeMethod;

        $this->_debugVar = $debugVar;
        $this->_debugText = $debugText;

        if ($this->_debugText != "") {
            $prefix = $this->_debugText . ":\n ";
        }else
            $prefix = "";

        ob_start();
        echo "\n";
        echo $this->_getPreText();
        echo $prefix;
        $this->_writer->$writeOut($this->_debugVar);
        echo "\n";
        $result = ob_get_clean();
        $fp = @file_put_contents($this->_filename, $result, FILE_APPEND);
        if ($fp === FALSE) {
            echo $this->_filename . ' is not writable';
        }
    }

}

?>
