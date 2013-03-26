<?php

/**
 *
 * DebugrLoad.php: Autoloader for PHPDebugr
 * 
 * It uses the 'spl_autoload_register' function
 * to make it easier to implement the lib
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

/**
 * Autoload method for PHPDebugr
 *  
 * @param string $class_name
 */
function PHPDebugr_autoload($class_name) {
    $class_file_path = str_replace('_', '/', $class_name) . '.php';
    require(dirname(__FILE__) . '/' . $class_file_path);
}
spl_autoload_register('PHPDebugr_autoload');
?>
