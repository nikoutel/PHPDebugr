<?php

Class Writer {

    public function getWriteMethod($writeOptionFlag) {
        if ($writeOptionFlag != '') {

            $reflCl = new ReflectionClass('WriteOptions');
            $bitArray = $reflCl->getConstants();
            if (array_key_exists($writeOptionFlag, $bitArray)) {
                $optstr = '$option = WriteOptions::' . $writeOptionFlag . ';'; // @todo array?
                eval($optstr);
                return $option;
            } else {
                throw new Exception;
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
