<?php

/**
 *
 * Output_Log: 
 * 
 * 
 * @package PHPDebugr
 * @subpackage output
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

Class Output_Log implements Output {

    private $_debugVar;
    private $_debugText;
    private $_writeMethod;
    private $_defaultWriteMethodScalar;
    private $_defaultWriteMethodComposite;
    private $_writer;
    private $_preText;
    private $_filename;

    /**
     * 
     * @param string $writeOptionFlag
     * @param Writer $writer
     */
    public function __construct($writeOptionFlag, Writer $writer) {

        $this->_writer = $writer;
        try {
            $this->_writeMethod = $this->_writer->getWriteMethod($writeOptionFlag);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        $this->_filename = config::$config['logFile'];
    }

    /**
     * 
     * @return string
     */
    private function _getPreText() {
        $timestamp = date('d/m/Y H:i:s');
        $requestFile = $_SERVER['REQUEST_URI'];
        $this->_preText = '(' . $timestamp . ') ' . $requestFile . "\n";
        return $this->_preText;
    }

    /**
     * 
     * @param mixed $debugVar
     * @param string $debugText
     */
    public function outputScalar($debugVar, $debugText) {

        $this->_defaultWriteMethodScalar = config::$config['defaultWriteMethodScalar']['Log'];
        if ($this->_writeMethod == '')
            $this->_writeMethod = $this->_defaultWriteMethodScalar;

        $writeOut = $this->_writeMethod;

        $this->_debugVar = $debugVar;
        $this->_debugText = $debugText;

        if ($this->_debugText != "") {
            $prefix = $this->_debugText . ": ";
        }else
            $prefix = "";

        ob_start();
        echo "\n";
        echo $this->_getPreText();
        echo $prefix;
        $this->_writer->$writeOut($this->_debugVar);
        echo "\n\n";
        $result = ob_get_clean();
        $fp = @file_put_contents($this->_filename, $result, FILE_APPEND);
        if ($fp === FALSE) {
            echo $this->_filename . ' is not writable';
        }
    }

    /**
     * 
     * @param mixed $debugVar
     * @param string $debugText
     */
    public function outputComposite($debugVar, $debugText) {

        $this->_defaultWriteMethodComposite = config::$config['defaultWriteMethodComposite']['Log'];
        if ($this->_writeMethod == '')
            $this->_writeMethod = $this->_defaultWriteMethodComposite;

        $writeOut = $this->_writeMethod;

        $this->_debugVar = $debugVar;
        $this->_debugText = $debugText;

        if ($this->_debugText != "") {
            $prefix = $this->_debugText . ":\n ";
        }else
            $prefix = "";

        ob_start();
        echo "\n";
        echo $this->_getPreText();
        echo $prefix;
        $this->_writer->$writeOut($this->_debugVar);
        echo "\n";
        $result = ob_get_clean();
        $fp = @file_put_contents($this->_filename, $result, FILE_APPEND);
        if ($fp === FALSE) {
            echo $this->_filename . ' is not writable';
        }
    }

}

?>
