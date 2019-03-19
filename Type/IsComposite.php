<?php

/**
 *
 * Type_IsComposite: Sends composite types to output
 * 
 * 
 * @package PHPDebugr
 * @subpackage type
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

namespace Debugr\Type;

use Debugr\Type;
use Debugr\Output;

Class IsComposite extends Type {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Sends composite var and description text to Output
     * 
     * @param Output $output
     */
    public function send(Output $output) {
        $output->outputComposite($this->_debugVar, $this->_debugText);
    }

}

?>
