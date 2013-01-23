<?php

Class Output_OutputLog implements  Output {
    
    const FILENAME = "output.log";

    public $debugVar;
    public $debugText;
    private $preText;
    
    public function __construct() {
        //parent::__construct();
    }
    
    public function getPreText(){
        $timestamp = date('d/m/Y H:i:s');
        $requestFile = $_SERVER['REQUEST_URI'];
        $this->preText = '(' . $timestamp . ') ' . $requestFile . "\n";
        return $this->preText;
    }

    public function outputScalar($debugVar, $debugText) {
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
        echo $this->debugVar;
        echo "\n\n";
        $result = ob_get_clean();
        file_put_contents(self::FILENAME, $result, FILE_APPEND);
    }

    public function outputComposite($debugVar, $debugText) {
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
        var_dump($this->debugVar);
        echo "\n";
        $result = ob_get_clean();
        file_put_contents(self::FILENAME, $result, FILE_APPEND);
    }

}

?>
