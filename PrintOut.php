<?php
Class PrintOut{
    
    public function getPrintOption($printOptionFlag) {
        if ($printOptionFlag != '') {
           // @todo isInBitFild();
            $optstr = '$option = PrintOptions::' . $printOptionFlag . ';'; // @todo array?
            eval($optstr); // @todo SECURITY
            return $option;
        }
    }
    
    public static function echos($str){
        echo $str;
    }
    public  function varDump($str){
        var_dump($str);
    }
    public static function PrintR($str){
        print_r($str);
    }
    public static function custom($str){
        //@todo write comment
    }
}
?>
