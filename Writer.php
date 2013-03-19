<?php

/**
 *
 * Writer: 
 * 
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

Class Writer {

    /**
     * 
     * @param string $writeOptionFlag
     * @return string
     * @throws InvalidArgumentException
     */
    public function getWriteMethod($writeOptionFlag) {
        if ($writeOptionFlag != '') {

            $reflCl = new ReflectionClass('WriteOptions');
            $bitArray = $reflCl->getConstants();

            $str = implode(",", array_keys($bitArray));
            if (array_key_exists($writeOptionFlag, $bitArray)) {
                $optstr = '$option = WriteOptions::' . $writeOptionFlag . ';';
                eval($optstr);
                return $option;
            } else {
                $errorMsg = 'Invalid argument - ';
                $errorMsg .= 'valid options: [' . implode(", ", array_keys($bitArray)) . '] - ';
                $errorMsg .= 'Default used';
                throw new InvalidArgumentException($errorMsg);
            }
        }
    }

    /**
     * 
     * @param string $var
     */
    public static function echos($var) {
        if (is_object($var)) {// @togo check if needet

            $var = 'Object';
            ;
        }
        echo $var;
    }

    /**
     * 
     * @param mixed $var
     */
    public function varDump($var) {
        var_dump($var);
    }

    /**
     * 
     * @param mixed $var
     */
    public static function printR($var) {
        print_r($var);
    }

    /**
     * 
     * @param mixed $var
     */
    public static function custom($var) {
        //@todo write comment
    }

}

?>
