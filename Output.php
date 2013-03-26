<?php

/**
 *
 * Output: interface; Defines the methods for the output classes
 * 
 * 
 * @package PHPDebugr
 * @subpackage main
 * @author Nikos Koutelidis nikoutel@gmail.com
 * @copyright 2013 Nikos Koutelidis 
 * @license http://www.mozilla.org/MPL/2.0/ Mozilla Public License Version 2.0
 * @link https://github.com/nikoutel/PHPDebugr 
 * 
 * 
 * This Source Code Form is subject to the terms of the Mozilla Public
 * License, v. 2.0. If a copy of the MPL was not distributed with this
 * file, You can obtain one at http://mozilla.org/MPL/2.0/. 
 * 
 */

interface Output {

    /**
     * Outputs using formatting specific for scalar types
     * 
     * @param mixed $debugVar
     * @param string $debugText
     */
    public function outputScalar($debugVar, $debugText);

    /**
     * Outputs  using formatting specific for composite types
     * 
     * @param mixed $debugVar
     * @param string $debugText
     */
    public function outputComposite($debugVar, $debugText);
}

?>
