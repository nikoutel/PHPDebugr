<?php

/**
 *
 * config: 
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

class config {

    /**
     *
     * @var array 
     * @todo replace Firebug with console
     */
    public static $config = array(
        'disabled' => FALSE, // kill switch
        'logFile' => 'output.log',
        'defaultOutput' => OutputOptions::Screen,
        'defaultWriteMethodScalar' => array(
            'Screen' => WriteOptions::echos,
            'Log' => WriteOptions::echos,
            'FireBug' => WriteOptions::echos
        ),
        'defaultWriteMethodComposite' => array(
            'Screen' => WriteOptions::varDump,
            'Log' => WriteOptions::varDump,
            'FireBug' => WriteOptions::varDump
        )
    );

}

?>
