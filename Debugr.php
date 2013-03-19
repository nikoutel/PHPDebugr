<?php

/**
 *
 * Debugr: Main class of the debugger.
 * 
 * Controls the incoming calls to the lib and calls the aprop functions
 * 
 * @package PHPDebugr
 * @subpackage main
 * @author Nikos Koutelidis nikoutel@gmail.com
 * @copyright 2013 Nikos Koutelidis 
 * @license http://www.mozilla.org/MPL/2.0/ Mozilla Public License Version 2.0
 * @link github 
 * 
 * 
 * This Source Code Form is subject to the terms of the Mozilla Public
 * License, v. 2.0. If a copy of the MPL was not distributed with this
 * file, You can obtain one at http://mozilla.org/MPL/2.0/. 
 * 
 */

Class Debugr {

    /**
     * The variable to be inspected
     * 
     * @var mixed 
     */
    private static $_debugVar;
    
    /**
     * Text describing the variable
     * 
     * @var string 
     */
    private static $_debugText;

    /**
     * @return mixed
     */
    public static function getDebugVar() {
        return self::$_debugVar;
    }

    /**
     * @return string
     */
    public static function getDebugText() {
        return self::$_debugText;
    }

    /**
     * 
     * @param mixed $debugVar
     * @param string $debugText
     * @param string $writeOption
     */
    public static function eDbg($debugVar, $debugText = "", $writeOption = "") {


        $defaultOutput = config::$config['defaultOutput'];
        if ($defaultOutput != 'None') {
            if (!config::$config['disabled'])
                self::_eDbgOut($debugVar, $debugText, $writeOption, $defaultOutput);
        }
    }

    /** can be called directly * */
    /**
     * 
     * @param mixed $debugVar
     * @param string $debugText
     * @param string $writeOption
     */
    public static function eDbgScreen($debugVar, $debugText = "", $writeOption = "") {

        if (!config::$config['disabled'])
            self::_eDbgOut($debugVar, $debugText, $writeOption, 'Screen');
    }

    /** can be called directly * */
    /**
     * 
     * @param mixed $debugVar
     * @param string $debugText
     * @param string $writeOption
     */
    public static function eDbgLog($debugVar, $debugText = "", $writeOption = "") {

        if (!config::$config['disabled'])
            self::_eDbgOut($debugVar, $debugText, $writeOption, 'Log');
    }

    /** can be called directly * */
    /**
     * 
     * @param mixed $debugVar
     * @param string $debugText
     * @param string $writeOption
     */
    public static function eDbgConsole($debugVar, $debugText = "", $writeOption = "") {

        if (!config::$config['disabled'])
            self::_eDbgOut($debugVar, $debugText, $writeOption, 'Console');
    }

    /**
     * 
     * @param mixed $debugVar
     * @param string $debugText
     * @param string $writeOption
     * @param string $outputOption
     */
    private static function _eDbgOut($debugVar, $debugText, $writeOption, $outputOption) {

        self::$_debugVar = $debugVar;
        self::$_debugText = $debugText;

        $isType = self::_getClassNameByType(self::$_debugVar);
        $output = 'Output_' . $outputOption;

        $writer = new Writer();
        $output = new $output($writeOption, $writer);
        $type = new $isType($output);
    }

    /**
     * Returns the class name according to the variable type
     * 
     * @param mixed $debugVar
     * @return string
     */
    private static function _getClassNameByType($debugVar) {
        $type = ucwords(strtolower(gettype($debugVar)));
        $type = str_replace(" ", "", $type);
        $type = 'Type_Is' . $type;
        return $type;
    }

}

?>
