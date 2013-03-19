<?php

/**
 *
 * DebugrLoad.php: 
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

/**
 * 
 * @param string $class_name
 * @todo spl_autoload_register
 */
function __autoload($class_name) {
    $class_file_path = str_replace('_', '/', $class_name) . '.php';
    require(dirname(__FILE__) . '/' . $class_file_path);
}

?>
