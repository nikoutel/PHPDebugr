<?php

Class Debugr {

    public static $debugVar; 
    public static $debugText;
    public static $options;

    public static function eDbg($debugVar, $debugText = "", $option = "") { // @todo var names
        //@todo check options

        $defaultOut = OutputOptions::Screen; // {Screen, Log, Mail}
        self::_eDbgOut($debugVar, $debugText, $option, $defaultOut);
    }
    
    /** can be called directly * */
    public static function eDbgScreen($debugVar, $debugText = "") {

        self::_eDbgOut($debugVar, $debugText, 'Screen');
    }

    /** can be called directly * */
    public static function eDbgLog($debugVar, $debugText = "") {

        self::_eDbgOut($debugVar, $debugText, 'Log');
    }
    
    /** can be called directly * */
    public static function eDbgMail($debugVar, $debugText = "") {

        self::_eDbgOut($debugVar, $debugText, 'Mail');
    }

    private static function _eDbgOut($debugVar, $debugText, $options, $out) {
        
        self::$debugVar = $debugVar;
        self::$debugText = $debugText;
        //self::$options = $options;

        $type = self::getDebugVarType(self::$debugVar);
        $output = 'Output_Output'.$out;

        $output = new $output($options);
        $typeObj = new $type($output);
        return $typeObj;
    }
    
    public static function getDebugVarType($debugVar) {
        $type = ucwords(strtolower(gettype($debugVar)));
        $type = str_replace(" ", "", $type);
        $type = 'Type_Is' . $type;
        return $type;
    }

}

?>
