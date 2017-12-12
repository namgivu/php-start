<?php

////region IO config
$SCRIPT_HOME = realpath(dirname(__FILE__)); //get current script path ref. https://stackoverflow.com/a/4645101/248616
$FILE_IN     = "$SCRIPT_HOME/io/in.txt";
$FILE_OUT    = "$SCRIPT_HOME/io/out.txt";

//region redirect stdout to file ref. https://stackoverflow.com/a/13260825/248616
$ob_file = fopen($FILE_OUT,'w');
ob_start('ob_file_callback');
function ob_file_callback($buffer)
{
    global $ob_file;
    fwrite($ob_file,$buffer);
}
//endregion

//region redirect stdin to file ref. TODO
//endregion

////endregion IO config


$fi = fopen("php://stdin", "r");
$s = fgets($fi);
fclose($fi);

print("Hello, World.\n");
print($s);
