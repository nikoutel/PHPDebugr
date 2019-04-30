<?php

/**
 *
 * Debugr: Main class of PHPDebugr and point of entry
 * 
 * Controls the incoming calls to the library
 * 
 * @package PHPDebugr
 * @subpackage main
 * @author Nikos Koutelidis nikoutel@gmail.com
 * @copyright 2013-2019 Nikos Koutelidis
 * @license http://www.mozilla.org/MPL/2.0/ Mozilla Public License Version 2.0
 * @link https://github.com/nikoutel/PHPDebugr 
 * 
 * 
 * This Source Code Form is subject to the terms of the Mozilla Public
 * License, v. 2.0. If a copy of the MPL was not distributed with this
 * file, You can obtain one at http://mozilla.org/MPL/2.0/. 
 * 
 */

namespace Nikoutel\Debugr;

if( !class_exists('Composer\\Autoload\\ClassLoader') )
{
    // Manually include files if composer is not used.
    require 'DebugrLoad.php';
}


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
     * Log filename
     *
     * @var string
     */
    private static $_logFile;

    /**
     * Log filename with priority
     *
     * @var string
     */
    private static $_logFilePrio;

    /**
     * Returns the variable to be inspected
     * 
     * @return mixed
     */
    public static function getDebugVar() {
        return self::$_debugVar;
    }

    /**
     * Returns the text describing the variable
     * 
     * @return string
     */
    public static function getDebugText() {
        return self::$_debugText;
    }

    /**
     * Main calling method for PHPDebugr
     * 
     * Initializes the debugging process using the default output
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

    /**
     * Calling method for PHPDebugr
     * 
     * Initializes the debugging process using the screen as output
     * (can be called directly)
     * 
     * @param mixed $debugVar
     * @param string $debugText
     * @param string $writeOption
     */
    public static function eDbgScreen($debugVar, $debugText = "", $writeOption = "") {

        if (!config::$config['disabled'])
            self::_eDbgOut($debugVar, $debugText, $writeOption, 'Screen');
    }

    /**
     * Calling method for PHPDebugr
     * 
     * Initializes the debugging process using the log file as output
     * (can be called directly)
     * 
     * @param mixed $debugVar
     * @param string $debugText
     * @param string $writeOption
     * @param string|null $logFile
     */
    public static function eDbgLog($debugVar, $debugText = "", $writeOption = "", $logFile = null) {

        if (!config::$config['disabled'])
            if (isset($logFile)){
                self::$_logFilePrio = $logFile;
            }
            self::_eDbgOut($debugVar, $debugText, $writeOption, 'Log');
    }

    /**
     * Calling method for PHPDebugr
     * 
     * Initializes the debugging process using the console as output
     * (can be called directly)
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
     * Finds out which objects are needed
     * and instantiates them
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

        $writer = new Writer();
        $namespacedOutput = __NAMESPACE__ . '\\Output\\' . $outputOption;
        $output = new $namespacedOutput($writeOption, $writer);

        if ($outputOption == 'Log' && isset(self::$_logFilePrio)) {
            $output -> setLogFile(self::$_logFilePrio);
            self::$_logFilePrio = null;
        } elseif ($outputOption == 'Log' && isset(self::$_logFile)) {
            $output -> setLogFile(self::$_logFile);
        }
        $type = new $isType($output);
    }

    /**
     * Calling method to set the log filename programmatically
     *
     * @param string $logFile
     */
    public static function setLogFile($logFile) {
        self::$_logFile = $logFile;
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
        $type = 'Is' . $type;
        $namespacedType = __NAMESPACE__ . '\\Type\\' . $type;
        return $namespacedType;
    }

}

?>
