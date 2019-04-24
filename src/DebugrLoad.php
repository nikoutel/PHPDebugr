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
 * @param string $className
 */
namespace Nikoutel\Debugr;

function PHPDebugr_autoload($className) {
    $baseDir = 'src' ;
    $firstNsPos = strpos($className, '\\');
    $className = substr($className, $firstNsPos);
    $debugrPath = dirname(dirname(dirname(__FILE__)));
    $className = ltrim($className, '\\');
    $fileName  = '';
    $namespace = '';
    if ($lastNsPos = strrpos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $pos = strpos($namespace, '\\');
        if ($pos !== false) {
            $nswbd = substr_replace($namespace, '\\' . $baseDir . '\\', $pos, strlen('\\'));
        } else {
            $nswbd = $namespace . '\\' . $baseDir . '\\';
        }
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $nswbd) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
    $file = $debugrPath . DIRECTORY_SEPARATOR .  $fileName;
    if (true === file_exists($file)) {
        require($file);
        return true;
    }
}

spl_autoload_register(__NAMESPACE__ . '\PHPDebugr_autoload');
?>
