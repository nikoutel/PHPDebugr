<?php

/**
 *
 * Type_IsInteger: Sends integers to output
 * 
 * 
 * @package PHPDebugr
 * @subpackage type
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

namespace Nikoutel\Debugr\Type;

use Nikoutel\Debugr\Output;

Class IsInteger extends IsScalar {

    public function __construct(Output $output) {
        parent::__construct();
        $this->send($output);
    }

}

?>
