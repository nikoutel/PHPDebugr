<?php

abstract Class Output_OutputMail implements  Output {
    
    public $debugVar;
    public $debugText;
    public $writeMethod;
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

    public abstract function outputScalar($debugVar, $debugText);
    public abstract function outputComposite($debugVar, $debugText);

}

?>
