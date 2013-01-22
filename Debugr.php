<?php

//function __autoload($class_name) {
//
//    $class_file_path = str_replace('_', '/', $class_name) . '.php';
//    // echo $class_file_path;
//    require($class_name);
//}

Class Debugr {

    public static $debugVar;
    public static $debugText;

    public static function eDbg($debugVar, $debugText = "") {
        // if DBG or LOG...
        self::eDbgPrint($debugVar, $debugText);
    }

    public static function eDbgPrint($debugVar, $debugText = "") {

        self::$debugVar = $debugVar;
        self::$debugText = $debugText;

        $type = ucwords(strtolower(gettype(self::$debugVar)));
        $type = str_replace(" ", "", $type);
        $type = 'Type_Is' . $type;

        $output = new Output_OutputScreen();

        $typeObj = new $type($output);
        return $typeObj;
    }

    public static function eDbgLog($debugVar, $debugText = "") {
        
    }

}

?>
