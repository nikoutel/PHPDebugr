PHPDebugr
=========

This is a debugger for inspecting values of variables. 


Usage
-----

Debugr::eDbg(mixed $var [, string $description [, string $writeOption]])
Debugr::eDbg writes the value of $var and the $description text (optional) to the default output, defined in config.php , using the $writeOption. Possible options for the default output are: Screen, Log, Console, and None.
(The predefined value is Screen)

Debugr::eDbgScreen(mixed $var [, string $description [, string $writeOption]])
Debugr::eDbgScreen writes the value of $var to the screen regardless of the default config.php file entry

Debugr::eDbgLog(mixed $var [, string $description [, string $writeOption]])
Debugr::eDbgLog writes the value of $var to the log file defined in config.php

Debugr::eDbgConsole(mixed $var [, string $description [, string $writeOption]])
Debugr::eDbgConsole writes the value of $var to the browsers console/Firebug (careful with that on live servers)


var

The variable to inspect


description

(optional)

Text to be displayd before the variable value e.g. The value of $thisVar is:


writeOption

(optional)

you can choose the way the output is written/formatted

options:

'e' or 'echoes'
'v' or 'varDump'
'r' or 'printR'
'c' or 'custom' not implemented (you can write your own)


If you omit this the defaults are used. For scalar types (integer, double, string) the default is echoes and for composite types (array, object, resource, boolean, null, unknown type) the default is varDump. The defaults can be changed in the config.php file.
(I know boolean is technically scalar and Null is well, Null but they are fitting better in the composite group)


Notes
-----

If None is used as the default output, Debugr::eDbg will not produce any output. This is not true for eDbgScreen, eDbgLog, eDbgConsole. You can disable all by settting: disable:true in config.php. This is some sort of kill switch.


How to use
----------

Use eDbg to output the variable values to the default output. On a developer server you can choose Screen, and then change it to Log for the live server. All Debugr::eDbg calls will now write to the log file instead of the screen.
On some occasions you want a different output then the default e.g., when outputting a specific variable on screen breaks the site layout. In this case you can use eDbgConsole to use the browser console regardless of the default output. In the same way you can use eDbgScreen, eDbgLog, according to the situation and your needs.
The value is formatted according to the variables type or the writeOption given.


Requirements
------------

Required PHP 5.3 (min)


Examples
--------

require('path/to/Debugr/DebugrLoad.php');
$varB = 42; 
Debugr::edbg($varB); 

    42


$varC = 103993/33102; 
Debugr::edbg($varC, 'the value of pi is'); 

    the value of pi is: 3.1415926530119


$varA = 'Guru Meditation'; 
Debugr::edbg($varA, NULL, 'v'); 

    string(15) "Guru Meditation"


$varE = array( 'black jack', 'gin rummy', 'hearts', 'bridge', 'checkers', 'cess', 'global thermonuclear war'); 
Debugr::edbg($varE, 'Shall we play a game?','r'); 

    Shall we play a game?:
    Array
    (
        [0] => black jack
        [1] => gin rummy
        [2] => hearts
        [3] => bridge
        [4] => checkers
        [5] => cess
        [6] => global thermonuclear war
    )


$varF = fopen('secretFile.xml', 'r'); 
Debugr::edbgLog($varF); 
fclose($varF); 
Debugr::edbgLog($varF); 

    will produce a log file entry:
    (13/07/2004 11:23:58) /TestOOP/Debug/example.php resource(19) of type (stream)
    (13/07/2004 11:23:58) /TestOOP/Debug/example.php resource(19) of type (Unknown)


$book = new stdClass; 
$book->php = 'PHP Design Patterns, Stephan Schmidt'; 
$book->c = 'The C Programming Language, Kernighan & Ritchie'; 
$book->unix = 'The unix programming environment, Kernighan & Pike'; 
$book->economics = 'Making Millions For Dummies'; Debugr::edbgConsole($book, '$book'); 
will produce a console output


Licence
-------

This software is licensed under the MPL 2.0: This Source Code Form is subject to the terms of the Mozilla Public License, v. 2.0. If a copy of the MPL was not distributed with this file, You can obtain one at http://mozilla.org/MPL/2.0/.





