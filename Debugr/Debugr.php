<?php

Class Debugr { 

    private static $_debugVar;
    private static $_debugText;

    public static function getDebugVar() {
        return self::$_debugVar;
    }

    public static function getDebugText() {
        return self::$_debugText;
    }

    public static function eDbg($debugVar, $debugText = "", $writeOption = "") {


        $defaultOutput = config::$config['defaultOutput']; 
        if ($defaultOutput != 'None'){
            if (!config::$config['disabled'])
            self::_eDbgOut($debugVar, $debugText, $writeOption, $defaultOutput);
        }
    }

    /** can be called directly * */
    public static function eDbgScreen($debugVar, $debugText = "", $writeOption = "") {

        if (!config::$config['disabled'])
        self::_eDbgOut($debugVar, $debugText, $writeOption, 'Screen');
    }

    /** can be called directly * */
    public static function eDbgLog($debugVar, $debugText = "", $writeOption = "") {

        if (!config::$config['disabled'])
        self::_eDbgOut($debugVar, $debugText, $writeOption, 'Log');
    }

    /** can be called directly * */
    public static function eDbgConsole($debugVar, $debugText = "", $writeOption = "") {

        if (!config::$config['disabled'])
        self::_eDbgOut($debugVar, $debugText, $writeOption, 'Console');
    }
    
    private static function _eDbgOut($debugVar, $debugText, $writeOption, $outputOption) {

        self::$_debugVar = $debugVar;
        self::$_debugText = $debugText;

        $isType = self::_getClassNameByType(self::$_debugVar);
        $output = 'Output_' . $outputOption;

        $writer = new Writer();
        $output = new $output($writeOption, $writer); 
        $type = new $isType($output); 
        return $type; 
    }

    private static function _getClassNameByType($debugVar) {
        $type = ucwords(strtolower(gettype($debugVar)));
        $type = str_replace(" ", "", $type);
        $type = 'Type_Is' . $type;
        return $type;
    }

}

?>
