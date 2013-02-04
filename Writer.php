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
                $optstr = '$option = WriteOptions::' . $writeOptionFlag . ';'; // @todo array?
                eval($optstr);
                return $option;
            } else {
                throw new InvalidArgumentException('valid: ' . implode(",", array_keys($bitArray)) . ' dafault used');
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
