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


        $defaultOutput = config::$config['defaultOutput']; // {Screen, Log, Mail}
        self::_eDbgOut($debugVar, $debugText, $writeOption, $defaultOutput);
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

    private static function _eDbgOut($debugVar, $debugText, $writeOption, $outputOption) {

        self::$_debugVar = $debugVar;
        self::$_debugText = $debugText;

        $typeCl = self::_getClassNameByType(self::$_debugVar);
        $outputCl = 'Output_Output' . $outputOption;

        $writer = new Writer();
        $output = new $outputCl($writeOption, $writer);
        $typeObj = new $typeCl($output);
        return $typeObj; //@todo ?
    }

    private static function _getClassNameByType($debugVar) {
        $type = ucwords(strtolower(gettype($debugVar)));
        $type = str_replace(" ", "", $type);
        $type = 'Type_Is' . $type;
        return $type;
    }

}

?>
