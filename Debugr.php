<?php

Class Debugr {

    public static $debugVar;
    public static $debugText;

    public static function eDbg($debugVar, $debugText = "", $printOptions = "") {


        $defaultOut = OutputOptions::Log; // {Screen, Log, Mail}
        self::_eDbgOut($debugVar, $debugText, $printOptions, $defaultOut);
    }

    /** can be called directly * */
    public static function eDbgScreen($debugVar, $debugText = "", $printOptions = "") {

        self::_eDbgOut($debugVar, $debugText, $printOptions, 'Screen');
    }

    /** can be called directly * */
    public static function eDbgLog($debugVar, $debugText = "", $printOptions = "") {

        self::_eDbgOut($debugVar, $debugText, $printOptions, 'Log');
    }

    /** can be called directly * */
    public static function eDbgMail($debugVar, $debugText = "", $printOptions = "") {

        self::_eDbgOut($debugVar, $debugText, $printOptions, 'Mail');
    }

    private static function _eDbgOut($debugVar, $debugText, $printOptions, $out) {

        self::$debugVar = $debugVar;
        self::$debugText = $debugText;

        $type = self::getClassNameByType(self::$debugVar);
        $output = 'Output_Output' . $out;

        $output = new $output($printOptions);
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
