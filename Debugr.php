<?php

Class Debugr {

    public static $debugVar;
    public static $debugText;

    public static function eDbg($debugVar, $debugText = "", $writeOption = "") {


        $defaultOut = OutputOptions::Screen; // {Screen, Log, Mail}
        self::_eDbgOut($debugVar, $debugText, $writeOption, $defaultOut);
    }

    /** can be called directly * */
    public static function eDbgScreen($debugVar, $debugText = "", $writeOption = "") {

        self::_eDbgOut($debugVar, $debugText, $writeOption, 'Screen');
    }

    /** can be called directly * */
    public static function eDbgLog($debugVar, $debugText = "", $writeOption = "") {

        self::_eDbgOut($debugVar, $debugText, $writeOption, 'Log');
    }

    /** can be called directly * */
    public static function eDbgMail($debugVar, $debugText = "", $writeOption = "") {

        self::_eDbgOut($debugVar, $debugText, $writeOption, 'Mail');
    }

    private static function _eDbgOut($debugVar, $debugText, $writeOption, $out) {

        self::$debugVar = $debugVar;
        self::$debugText = $debugText;

        $type = self::getClassNameByType(self::$debugVar);
        $output = 'Output_Output' . $out;

        $writer = new Writer();
        $output = new $output($writeOption, $writer);
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
