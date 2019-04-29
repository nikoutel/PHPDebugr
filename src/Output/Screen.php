<?php

/**
 *
 * Output_Screen: Outputs to screen using 
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

Class Screen implements Output {

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
     * 
     * @param string $writeOptionFlag
     * @param Writer $writer
     */
    public function __construct($writeOptionFlag, Writer $writer) {

        $this->_writer = $writer;
        try {
            $this->_writeMethod = $this->_writer->getWriteMethod($writeOptionFlag);
        } catch (\Exception $e) {
            error_log($e->getMessage());
        }
    }

    /**
     * Outputs to screen using formatting specific for scalar types
     * 
     * @param mixed $debugVar
     * @param string $debugText
     */
    public function outputScalar($debugVar, $debugText) {

        $this->_defaultWriteMethodScalar = config::$config['defaultWriteMethodScalar']['Screen'];
        if ($this->_writeMethod == '')
            $this->_writeMethod = $this->_defaultWriteMethodScalar;

        $writeOut = $this->_writeMethod;

        $this->_debugVar = $debugVar;
        $this->_debugText = $debugText;

        if ($this->_debugText != "") {
            $prefix = $this->_debugText . ': ';
        } else
            $prefix = "";

        echo '<pre>';
        echo $prefix;
        $this->_writer->$writeOut($this->_debugVar);
        echo '</pre>';
    }

    /**
     * Outputs to screen using formatting specific for composite types
     * 
     * @param mixed $debugVar
     * @param string $debugText
     */
    public function outputComposite($debugVar, $debugText) {

        $this->_defaultWriteMethodComposite = config::$config['defaultWriteMethodComposite']['Screen'];
        if ($this->_writeMethod == '')
            $this->_writeMethod = $this->_defaultWriteMethodComposite;

        $writeOut = $this->_writeMethod;

        $this->_debugVar = $debugVar;
        $this->_debugText = $debugText;

        if ($this->_debugText != "") {
            $prefix = $this->_debugText . ':<br />';
        } else
            $prefix = "";

        echo '<pre>';
        echo $prefix;
        $this->_writer->$writeOut($this->_debugVar);
        echo '</pre>';
    }

}

?>