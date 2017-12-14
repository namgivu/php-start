<?php
/* challenge ref. https://www.hackerrank.com/challenges/the-birthday-bar */

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
$r = fgets($f); $n = (int)$r;
$r = fgets($f); $a = array_map('intval',explode(' ',$r));
$r = fgets($f); sscanf($r, '%d %d', $d, $m);
fclose($f);

$iStart=0; $iEnd=$iStart+$m-1;
$sum=0;   for ($i = $iStart; $i <= $iEnd; $i++) {$sum+=$a[$i];}
$count=0; if ($sum==$d) {$count++;}

$nn = $n-1-$m-1;
for ($iStart = 1; $iStart <= $nn; $iStart++) {
  $sum -= $a[$iStart-1];
  $iEnd=$iStart+$m-1;
  $sum += $a[$iEnd];
  if ($sum==$d) {
    $count++;
  }
}

echo $count;
