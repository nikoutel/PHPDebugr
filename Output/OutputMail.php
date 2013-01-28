<?php

abstract Class Output_OutputMail implements  Output {
    
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
        } catch (Exception $exc) {
            echo 'valid: {e,v,r,c}'; //@todo error msg
        }
    }

    public abstract function outputScalar($debugVar, $debugText);
    public abstract function outputComposite($debugVar, $debugText);

}

?>
