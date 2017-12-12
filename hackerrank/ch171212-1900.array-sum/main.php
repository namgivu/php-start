<?php
/* challenge ref. https://www.hackerrank.com/challenges/simple-array-sum/problem */

//region IO config
  $SCRIPT_HOME = realpath(dirname(__FILE__)); //get current script path ref. https://stackoverflow.com/a/4645101/248616
  $FILE_IN     = "$SCRIPT_HOME/io/in.txt";
  $FILE_OUT    = "$SCRIPT_HOME/io/out.txt";

  //region redirect stdout to file ref. https://stackoverflow.com/a/13260825/248616
  $ob_file = fopen($FILE_OUT,'w');
  $ob_file_callback = function($buffer) {
    global $ob_file;
    fwrite($ob_file, trim($buffer));
  };
  ob_start($ob_file_callback);
  //endregion

  //region redirect stdin to file TODO ref. https://stackoverflow.com/q/47771547/248616
  $PHP_STDIN = $FILE_IN; //redirect00 simulate the redirect by stream value
  //endregion

//endregion IO config

?>

<?
//redirect01 enable below line when submit to hackerrank
//$PHP_STDIN = 'php://stdin';
$f = fopen($PHP_STDIN, 'r');
fscanf($f, "%i", $n);
$a = array_map('intval', explode(' ', fgets($f)) );
fclose($f);

$s=0;
foreach ($a as $i) {
  $s += $i;
}

echo $s;
