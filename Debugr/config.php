<?php

class config {

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
