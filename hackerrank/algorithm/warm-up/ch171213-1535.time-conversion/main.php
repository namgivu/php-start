<?php
/* challenge ref. https://www.hackerrank.com/challenges/time-conversion */

//region IO config
  $SCRIPT_HOME = realpath(dirname(__FILE__)); //get current script path ref. https://stackoverflow.com/a/4645101/248616
  $FILE_IN     = "$SCRIPT_HOME/io/in.txt";
  $FILE_OUT    = "$SCRIPT_HOME/io/out.txt";

  //region redirect stdout to file ref. https://stackoverflow.com/a/13260825/248616
  $ob_file = fopen($FILE_OUT,'w');
  $ob_file_callback = function($buffer) {
    global $ob_file;
    fwrite($ob_file, trim($buffer,"\n"));
  };
  ob_start($ob_file_callback);
  //endregion

  //region redirect stdin to file TODO ref. https://stackoverflow.com/q/47771547/248616
  $PHP_STDIN = $FILE_IN; //redirect00 simulate the redirect by stream value
  //endregion

//endregion IO config
?>

<?php
//redirect01 enable below line when submit to hackerrank
//$PHP_STDIN = 'php://stdin';
$f = fopen($PHP_STDIN, 'r');
$time = fgets($f);
fclose($f);

//get hour
$time=trim($time);
$parts = explode(':', $time);
$hour = (int)$parts[0];

//get AM/PM
$ampm = substr($parts[2], -2, 2);

//convert
if ($hour!=12) {
  if ($ampm=='PM') {
    $hour += 12;
    if ($hour==24) { $hour=0; }
  }
} else { //hour=12
  $hour = ($ampm=='PM')?12:00;
}

//output
$second=substr($parts[2], 0, 2);
echo sprintf('%02d:%02d:%02d', $hour,$parts[1],$second);
