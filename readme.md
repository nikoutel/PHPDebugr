PHPDebugr
=========

This is a debugger for inspecting values of variables. 

## usage ##

**Debugr::eDbg**(mixed *$var* [, string *$description* [, string *$optionFlag*]])

**Debugr::eDbgScreen**(mixed *$var* [, string *$description* [, string *$optionFlag*]])

**Debugr::eDbgLog**(mixed *$var* [, string *$description* [, string *$optionFlag*]])

**Debugr::eDbgConsole**(mixed *$var* [, string *$description* [, string *$optionFlag*]])

*Debugr::eDbg* - writes the value of *$var* var to the default output defined in config.php,
possible options are: screen, log file, and console/Firebug.


*Debugr::eDbgScreen* - writes the value of *$var* to the screen regardless of the default *config.php* entry.

*Debugr::eDbgLog* - writes the value of *$var* to the log file defined in *config.php*

*Debugr::eDbgConsole* - writes the value of *$var* to the browsers   console/Firebug (careful with that on live servers)
