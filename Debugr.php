<?php

Class Debugr {

    public static $debugVar;
    public static $debugText;

    public static function getDebugVarType($debugVar) {
        $type = ucwords(strtolower(gettype($debugVar)));
        $type = str_replace(" ", "", $type);
        $type = 'Type_Is' . $type;
        return $type;
    }

    public static function eDbg($debugVar, $debugText = "") {
        // if DBG or LOG...
        $out = 'Screen'; //?
        $methodName = 'eDbg' . $out;
        self::$methodName($debugVar, $debugText);
    }
    /** can be called directly **/
    public static function eDbgScreen($debugVar, $debugText = "") {

        self::$debugVar = $debugVar;
        self::$debugText = $debugText;

        $type = self::getDebugVarType(self::$debugVar);
        $output = new Output_OutputScreen();
        $typeObj = new $type($output);
        return $typeObj;
    }
    /** can be called directly **/
    public static function eDbgLog($debugVar, $debugText = "") {
        self::$debugVar = $debugVar;
        self::$debugText = $debugText;

        $type = self::getDebugVarType(self::$debugVar);
        $output = new Output_OutputLog();
        $typeObj = new $type($output);
        return $typeObj;
    }

}

?>
