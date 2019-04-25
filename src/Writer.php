<?php

/**
 *
 * Writer: Provides the 'write methods'
 * 
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

Class Writer {

    /**
     * Returns the write method according to the writeOptionFlag 
     * 
     * @param string $writeOptionFlag
     * @return string
     * @throws \InvalidArgumentException
     */

    public function getWriteMethod($writeOptionFlag) {
        if ($writeOptionFlag != '') {

            $reflCl = new \ReflectionClass('Nikoutel\Debugr\WriteOptions');
            $bitArray = $reflCl->getConstants();

            $str = implode(",", array_keys($bitArray));
            if (array_key_exists($writeOptionFlag, $bitArray)) {
                $optstr = 'Nikoutel\Debugr\WriteOptions::' . $writeOptionFlag;
                $option = constant($optstr);
                return $option;
            } else {
                $errorMsg = 'Invalid argument - ';
                $errorMsg .= 'valid options: [' . implode(", ", array_keys($bitArray)) . '] - ';
                $errorMsg .= 'Default used';
                throw new \InvalidArgumentException($errorMsg);
            }
        }
    }

    /**
     * @param string $var
     */
    public static function echoes($var) {
        /**
         * If $var is an Object replace its value with the
         * string 'Object' to prevent the
         * "Catchable fatal error: Object could not be converted to string"
         * error
         */
        if (is_object($var)) {

            $var = 'Object';
            ;
        }
        echo $var;
    }

    /**
     * @param mixed $var
     */
    public function varDump($var) {
        var_dump($var);
    }

    /**
     * @param mixed $var
     */
    public static function printR($var) {
        print_r($var);
    }

    /**
     * The custom method is not implemented (you can write your own) 
     * 
     * @param mixed $var
     */
    public static function custom($var) {
        
        //your code here
    }

}

?>
