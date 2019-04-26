<?php

/**
 *
 * Type: abstract; Sets the variables to be inherited and defines
 * the methods for the type classes
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

abstract Class Type {

    /**
     * @var mixed 
     */
    protected $_debugVar;
    
    /**
     * @var string 
     */
    protected $_debugText;

    public function __construct() {
        $this->_debugVar = Debugr::getDebugVar();
        $this->_debugText = Debugr::getDebugText();
    }

    abstract public function send(Output $output);
}

?>
