<?php

/**
 *
 * Type: 
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

abstract Class Type {

    protected $_debugVar;
    protected $_debugText;

    public function __construct() {
        $this->_debugVar = Debugr::getDebugVar();
        $this->_debugText = Debugr::getDebugText();
    }

    abstract public function send(Output $output);
}

?>
