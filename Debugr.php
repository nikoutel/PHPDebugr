<?php

//function __autoload($class_name) {
//
//    $class_file_path = str_replace('_', '/', $class_name) . '.php';
//    // echo $class_file_path;
//    require($class_name);
//}

Class Debugr {

    public static $var;
    public static $varName;

    public static function eDbg($var, $varName = "") {
        // if DBG or LOG...
        self::eDbgPrint($var, $varName);
    }

    public static function eDbgPrint($var, $varName = "") {

        self::$var = $var;
        self::$varName = $varName;

        $type = ucwords(strtolower(gettype(self::$var)));
        $type = str_replace(" ", "", $type);
        $type = 'Type_Is' . $type;

        $output = new Output_OutputPrint();

        $typeObj = new $type($output);
        return $typeObj;
    }

    public static function eDbgLog($var, $varName = "") {
        
    }

}

?>
