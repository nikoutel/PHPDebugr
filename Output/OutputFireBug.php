<?php

Class Output_OutputFireBug implements Output { // @todo rename to console

    private $_debugVar;
    private $_debugText;
    private $_writeMethod;
    private $_defaultWriteMethodScalar;
    private $_defaultWriteMethodComposite;
    private $_writer;

    public function __construct($writeOptionFlag, Writer $writer) {

        $this->_writer = $writer;
        try {
            $this->_writeMethod = $this->_writer->getWriteMethod($writeOptionFlag);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function outputScalar($debugVar, $debugText) {
        $this->_defaultWriteMethodScalar = config::$config['defaultWriteMethodScalar']['FireBug'];
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
//        echo "\n";
//        echo $this->_getPreText();
        echo $prefix;
        $this->_writer->$writeOut($this->_debugVar);
//        echo "\n\n";
        $result = ob_get_clean();
        $result = str_replace("\"", "\\\"", $result);
        $result = str_replace("\n", "\\r\\n", $result);
        echo '<script type="text/javascript">';
        echo 'console.info("' . $result . '")';
        echo '</script>';
    }

    public function outputComposite($debugVar, $debugText) {
        $this->_defaultWriteMethodComposite = config::$config['defaultWriteMethodComposite']['FireBug'];
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
//        echo "\n";
//        echo $this->_getPreText();
        echo $prefix;
        $this->_writer->$writeOut($this->_debugVar);
//        echo "\n\n";
        $result = ob_get_clean();
        $result = str_replace("\"", "\\\"", $result);
        $result = str_replace("\n", "\\r\\n", $result);
        echo '<script type="text/javascript">';
        echo 'console.info("' . $result . '")';
        echo '</script>';
    }

}

?>
