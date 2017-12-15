<?php
/* challenge ref. https://www.hackerrank.com/challenges/picking-numbers */

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
$s = fgets($f); $n = (int)$s;
$s = fgets($f); $a = array_map('intval', explode(' ',$s));
fclose($f);

sort($a);
$i = 0;
$base = null;
$count = 0; $countMax = PHP_INT_MIN;
while (true) {
  if ($i>=$n) { break; }

  if ($base==null) { $base = $a[$i]; }
  if (abs($a[$i]-$base)<=1) {//a[i] is in same connected group
    $count++;
  } else {//a[i] is the start of new group
    if ($count>$countMax) {
      $countMax=$count;
    }
    $count=1;
    $base=$a[$i];
  }

  $i++;
}

echo $countMax != PHP_INT_MIN? $countMax : 0;
