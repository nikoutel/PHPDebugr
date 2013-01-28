<?php

class config {

    public static $config = array(
        'logFile' => 'output.log',
        'defaultOutput' => OutputOptions::Log,
        'defaultWriteMethodScalar' => array(
            'Screen' => WriteOptions::echos,
            'Log' => WriteOptions::echos,
            'Mail' => WriteOptions::echos
        ),
        'defaultWriteMethodComposite' => array(
            'Screen' => WriteOptions::varDump,
            'Log' => WriteOptions::varDump,
            'Mail' => WriteOptions::varDump
        )
    );
}

?>
