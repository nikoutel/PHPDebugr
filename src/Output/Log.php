<?php

/**
 *
 * Output_Log: Outputs to the log file using
 * the 'write methods' provided by 'Writer'
 *
 *
 * @package PHPDebugr
 * @subpackage output
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

namespace Nikoutel\Debugr\Output;

use Nikoutel\Debugr\Output;
use Nikoutel\Debugr\Writer;
use Nikoutel\Debugr\config;

Class Log implements Output {

    /**
     * @var mixed
     */
    private $_debugVar;

    /**
     * @var string
     */
    private $_debugText;

    /**
     * @var string
     */
    private $_writeMethod;

    /**
     * @var string
     */
    private $_defaultWriteMethodScalar;

    /**
     * @var string
     */
    private $_defaultWriteMethodComposite;

    /**
     * @var Writer
     */
    private $_writer;

    /**
     * @var string
     */
    private $_preText;

    /**
     * @var string
     */
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
        } catch (\Exception $e) {
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
     * Outputs to the log file using formatting specific for scalar types
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
     * Outputs to the log file using formatting specific for composite types
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
