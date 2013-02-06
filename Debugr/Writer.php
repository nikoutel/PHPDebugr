<?php

Class Writer {

    /**
     * 
     * @param type $writeOptionFlag
     * @return type
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
                $errorMsg .= 'valid options: [' . implode(", ", array_keys($bitArray)). '] - ';
                $errorMsg .= 'Default used';
                throw new InvalidArgumentException($errorMsg);
            }
        }
    }

    public static function echos($var) {
        if (is_object($var)) {

            $var = 'Object';;
        }
        echo $var;
    }

    public function varDump($var) {
        var_dump($var);
    }

    public static function printR($var) {
        print_r($var);
    }

    public static function custom($var) {
        //@todo write comment
    }

}

?>
