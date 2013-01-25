<?php

Class Debugr {

    public static $debugVar; 
    public static $debugText;
    public static $options;

    public static function eDbg($debugVar, $debugText = "", $printOptionFlag = "") { // @todo var names
        //@todo check options

        $defaultOut = OutputOptions::Log; // {Screen, Log, Mail}
        self::_eDbgOut($debugVar, $debugText, $printOptionFlag, $defaultOut);
    }
    
    /** can be called directly * */
    public static function eDbgScreen($debugVar, $debugText = "", $printOptionFlag = "") {

        self::_eDbgOut($debugVar, $debugText, $printOptionFlag, 'Screen');
    }

    /** can be called directly * */
    public static function eDbgLog($debugVar, $debugText = "", $printOptionFlag = "") {

        self::_eDbgOut($debugVar, $debugText, $printOptionFlag, 'Log');
    }
    
    /** can be called directly * */
    public static function eDbgMail($debugVar, $debugText = "", $printOptionFlag = "") {

        self::_eDbgOut($debugVar, $debugText, $printOptionFlag, 'Mail');
    }

    private static function _eDbgOut($debugVar, $debugText, $printOptionFlag, $out) {
        
        self::$debugVar = $debugVar;
        self::$debugText = $debugText;
        //self::$options = $options;

        $type = self::getClassNameByType(self::$debugVar);
        $output = 'Output_Output'.$out;

        $output = new $output($printOptionFlag);
        $typeObj = new $type($output);
        return $typeObj;
    }
    
    public static function getClassNameByType($debugVar) {
        $type = ucwords(strtolower(gettype($debugVar)));
        $type = str_replace(" ", "", $type);
        $type = 'Type_Is' . $type;
        return $type;
    }

}

?>
