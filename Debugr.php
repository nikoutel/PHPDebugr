<?php

Class Debugr {

    public static $debugVar;
    public static $debugText;

    public static function eDbg($debugVar, $debugText = "", $printOption = "") {


        $defaultOut = OutputOptions::Screen; // {Screen, Log, Mail}
        self::_eDbgOut($debugVar, $debugText, $printOption, $defaultOut);
    }

    /** can be called directly * */
    public static function eDbgScreen($debugVar, $debugText = "", $printOption = "") {

        self::_eDbgOut($debugVar, $debugText, $printOption, 'Screen');
    }

    /** can be called directly * */
    public static function eDbgLog($debugVar, $debugText = "", $printOption = "") {

        self::_eDbgOut($debugVar, $debugText, $printOption, 'Log');
    }

    /** can be called directly * */
    public static function eDbgMail($debugVar, $debugText = "", $printOption = "") {

        self::_eDbgOut($debugVar, $debugText, $printOption, 'Mail');
    }

    private static function _eDbgOut($debugVar, $debugText, $printOption, $out) {

        self::$debugVar = $debugVar;
        self::$debugText = $debugText;

        $type = self::getClassNameByType(self::$debugVar);
        $output = 'Output_Output' . $out;

        $output = new $output($printOption);
        $typeObj = new $type($output);
        return $typeObj; //@todo ?
    }

    public static function getClassNameByType($debugVar) {
        $type = ucwords(strtolower(gettype($debugVar)));
        $type = str_replace(" ", "", $type);
        $type = 'Type_Is' . $type;
        return $type;
    }

}

?>
