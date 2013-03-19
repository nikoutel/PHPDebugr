<?php

/**
 *
 * Type_IsBoolean: sends booleans to output
 * 
 * 
 * @package PHPDebugr
 * @subpackage type
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

Class Type_IsBoolean extends Type_IsComposite {

    public function __construct(Output $output) {
        parent::__construct();
        $this->send($output);
    }

}

?>
